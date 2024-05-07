<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Konselor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\KonselorRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserKonselorRequest;

/**
 * Class KonselorController
 * @package App\Http\Controllers
 */
class KonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $keyword = $req->keyword;
        $konselors = Konselor::query();

        if (isset($keyword)) {
            $konselors
                ->where(function ($query) use ($keyword) {
                    $query
                        ->where('nama_konselor', 'like', '%' . $keyword . '%')
                        ->orWhere('notelpon_konselor', 'like', '%' . $keyword . '%')
                        ->orWhere('unit_kerja', 'like', '%' . $keyword . '%');
                })
                ->get();
        }

        $konselors = $konselors->paginate();

        return view('konselor.index', compact('konselors'))->with('i', (request()->input('page', 1) - 1) * $konselors->perPage());
    }

    public function createuser()
    {
        $user = new User();

        return view('konselor.createuser', compact('user'));
    }

    public function storeuser(UserKonselorRequest $request)
    {
        $user = new User();
        $validated = $request->validated();

        try {
            $user->name = $validated['name'];
            $user->username = Str::lower($validated['username']);
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->isPasien = 0;
            $user->save();

            $role = Role::where('name', 'Konselor')->first();
            $user->assignRole($role);
            $user->syncPermissions($role->permissions);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->route('konselors.createuser')->with('error', 'User sudah pernah dibuat!');
            }
        }

        //get last inserted id for redirecting
        $id_user = $user->id;

        return redirect()->action([KonselorController::class, 'create'], ['id_user' => $id_user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_user)
    {
        $konselor = new Konselor();
        $user = User::findOrFail($id_user);

        return view('konselor.create', compact('konselor', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KonselorRequest $request)
    {
        //mendefinisikan nilai untuk id_konselor dan id_user
        $id_konselor = random_int(1, 999999);

        // ambil nilai yang sudah valid
        $validated = $request->validated();

        //definisikan kolom lain yang tidak berasal dari form input
        $validated['id_konselor'] = $id_konselor;
        $validated['id_user'] = decrypt($request->id_user);

        //cek apakah ada file yang diupload atau tidak
        if ($request->file('foto_konselor') !== null) {
            //get request file
            $file = $request->file('foto_konselor');
            $extension = $file->getClientOriginalExtension();
            $filename = 'id_' . $id_konselor . '.' . $extension; //get file original name
            $savefilename = 'id_' . $id_konselor . '.' . $file->getClientOriginalExtension(); //save with id konselor
            $path = 'foto_konselor/' . $savefilename;

            Storage::disk('public')->put($path, file_get_contents($file)); //save file to storage folder
            $validated['foto_konselor'] = trim($filename);

            Konselor::create($validated);
        } else {
            Konselor::create($validated);
        }

        return redirect()->route('konselors.index')->with('success', 'Konselor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id_konselor = decrypt($id);
        $konselor = Konselor::find($id_konselor);

        return view('konselor.show', compact('konselor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id_konselor = decrypt($id);
        $konselor = Konselor::find($id_konselor);

        return view('konselor.edit', compact('konselor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KonselorRequest $request, Konselor $konselor)
    {
        $validated = $request->validated();

        //cek apakah ada file yang diupload atau tidak
        if ($request->file('foto_konselor') == null) {
            $validated['foto_konselor'] = $konselor->foto_konselor; //set tetap default
            $konselor->update($validated);
        } else {
            //get request file
            $file = $request->file('foto_konselor');
            $extension = $file->getClientOriginalExtension();
            $filename = 'id_' . $konselor->id_konselor . '.' . $extension; //get file original name
            $savefilename = 'id_' . $konselor->id_konselor . '.' . $file->getClientOriginalExtension(); //save with id konselor
            $path = 'foto_konselor/' . $savefilename;

            Storage::disk('public')->put($path, file_get_contents($file)); //save file to storage folder
            $validated['foto_konselor'] = trim($filename);

            $konselor->update($validated);
        }

        return redirect()->route('konselors.index')->with('success', 'Konselor berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            // Dekripsi ID konselor
            $id_konselor = decrypt($id);

            // Temukan konselor berdasarkan ID
            $konselor = Konselor::findOrFail($id_konselor);

            // Hapus konselor dari tabel konselors
            $konselor->delete();

            // Hapus pengguna yang terkait dari tabel users
            $user = User::where('id', $konselor->id_user)->firstOrFail();
            $user->delete();

            // Hapus peran "Konselor" dari pengguna
            $role = Role::where('name', 'Konselor')->first();
            $user->removeRole($role);

            // Hapus izin yang terkait dengan peran "Konselor"
            $user->revokePermissionTo($role->permissions);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect()->route('konselors.index')->with('error', 'Konselor tidak bisa dihapus!');
            }
        }

        return redirect()->route('konselors.index')->with('success', 'Konselor deleted successfully');
    }

    public function showResetPasswordForm($id)
    {
        try {
            // Temukan konselor berdasarkan ID
            $konselor = Konselor::findOrFail($id);

            // Temukan pengguna yang terkait dari tabel users
            $user = User::where('id', $konselor->id_user)->firstOrFail();
        } catch (QueryException $e) {
            return redirect()->route('konselors.index')->with('error', 'Gagal membuka halaman reset password!');
        }

        return view('konselor.reset_password', compact('konselor', 'user'));
    }

    public function updatePassword(Request $request, $id)
    {
        // Validasi input form disini jika diperlukan
        $validatedData = $request->validate([
            'password' => 'nullable|min:8|confirmed|regex:/^\S*$/',
            'password_confirmation' => 'nullable|min:8|regex:/^\S*$/',
        ], [
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password tidak boleh mengandung spasi.',
            'password_confirmation.min' => 'Konfirmasi password minimal harus 8 karakter.',
            'password_confirmation.regex' => 'Konfirmasi password tidak boleh mengandung spasi.',
        ]);

        try {
            // Temukan konselor berdasarkan ID
            $konselor = Konselor::findOrFail($id);

            // Temukan pengguna yang terkait dari tabel users
            $user = User::where('id', $konselor->id_user)->firstOrFail();

            // Update password pengguna
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (QueryException $e) {
            return redirect()->route('konselors.index')->with('error', 'Gagal mereset password!');
        }

        return redirect()->route('konselors.index')->with('success', 'Password berhasil direset!');
    }

    // public function resetPasswordForm($id)
    // {
    //     $konselor = Konselor::findOrFail($id);
    //     return view('konselor.reset_password', compact('konselor'));
    // }

    // public function resetPassword(Request $request, $id)
    // {
    //     $request->validate([
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $konselor = Konselor::findOrFail($id);
    //     $user = User::where('email', $konselor->email)->first();
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'User tidak ditemukan.');
    //     }

    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     return redirect()->route('konselors.index')->with('success', 'Password konselor berhasil direset.');
    // }
}