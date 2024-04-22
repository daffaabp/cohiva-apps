<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Konselor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\KonselorRequest;
use App\Http\Requests\UserKonselorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        if(isset($keyword)){
            $konselors->where(function($query) use ($keyword){
                $query->where('nama_konselor','like', '%'.$keyword.'%')
                ->orWhere('notelpon_konselor','like', '%'.$keyword.'%')
                ->orWhere('unit_kerja', 'like', '%'.$keyword.'%');
            })->get();
        }

        $konselors = $konselors->paginate();

        return view('konselor.index', compact('konselors'))
            ->with('i', (request()->input('page', 1) - 1) * $konselors->perPage());
    }

    public function createuser(){
        $user = new User();

        return view('konselor.createuser', compact('user'));
    }

    public function storeuser(UserKonselorRequest $request){
        $user = new User();
        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->username = Str::lower($validated['username']);
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->isPasien = 0;
        $user->save();

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
        }else{
            Konselor::create($validated);
        }

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor created successfully.');
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

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor berhasil diubah');
    }

    public function destroy($id)
    {
        $id_konselor = decrypt($id);
        Konselor::find($id_konselor)->delete();

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor deleted successfully');
    }
}