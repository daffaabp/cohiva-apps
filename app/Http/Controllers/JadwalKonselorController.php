<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Models\JadwalKonselor;
use Illuminate\Database\QueryException;
use App\Http\Requests\JadwalKonselorRequest;

/**
 * Class JadwalKonselorController
 * @package App\Http\Controllers
 */
class JadwalKonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $keyword = $req->keyword;
        $jadwalKonselors = JadwalKonselor::query();

        if (isset($keyword)) {
            $jadwalKonselors = $jadwalKonselors->join('konselor', 'jadwal_konselor.id_konselor', '=', 'konselor.id_konselor')
                ->where(function ($query) use ($keyword) {
                    $query->where('konselor.nama_konselor', 'like', '%' . $keyword . '%')
                        ->orWhere('hari', 'like', '%' . $keyword . '%')
                        ->orWhere('jam', 'like', '%' . $keyword . '%');
                });
        }

        $jadwalKonselors = $jadwalKonselors->paginate();

        return view('jadwal-konselor.index', compact('jadwalKonselors'))
            ->with('i', (request()->input('page', 1) - 1) * $jadwalKonselors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwalKonselor = new JadwalKonselor();
        $konselor = Konselor::all();
        return view('jadwal-konselor.create', compact('jadwalKonselor', 'konselor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalKonselorRequest $request)
    {
        //deklarasikan variable
        $id_konselor = $request->id_konselor;
        $hari = $request->hari;
        $jam = $request->jam;
        //kita cek apakah sudah pernah buat jadwal yang sama atau belum
        $jadwalkonselor = JadwalKonselor::where('id_konselor', '=', $id_konselor)
            ->where('hari', '=', $hari)
            ->where('jam', '=', $jam)
            ->first();

        if (!empty($jadwalkonselor)) {
            return redirect()->route('jadwal-konselors.create')
                ->with('error', 'Jadwal Konselor sudah pernah dibuat!')
                ->with('id', $jadwalkonselor->id);
        }


        JadwalKonselor::create($request->validated());

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'Jadwal Konselor berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id_jadwalkonselor = decrypt($id);
        $jadwalKonselor = JadwalKonselor::find($id_jadwalkonselor);

        return view('jadwal-konselor.show', compact('jadwalKonselor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id_jadwalkonselor = decrypt($id);
        $jadwalKonselor = JadwalKonselor::find($id_jadwalkonselor);
        $konselor = Konselor::all();

        return view('jadwal-konselor.edit', compact('jadwalKonselor', 'konselor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalKonselorRequest $request, $id)
    {
        $id_jadwalkonselor = decrypt($id);
        $jadwalKonselor = JadwalKonselor::find($id_jadwalkonselor);
        $jadwalKonselor->update($request->validated());

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'Jadwal Konselor berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            $id_jadwalkonselor = decrypt($id);
            JadwalKonselor::find($id_jadwalkonselor)->delete();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1451) {
                return redirect()->route('jadwal-konselors.index')
                    ->with('error', 'Jadwal tidak bisa dihapus!');
            }
        }

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'Jadwal Konselor berhasil dihapus');
    }
}