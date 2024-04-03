<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonselor;
use App\Http\Requests\JadwalKonselorRequest;
use App\Models\Konselor;

/**
 * Class JadwalKonselorController
 * @package App\Http\Controllers
 */
class JadwalKonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalKonselors = JadwalKonselor::paginate();

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
        JadwalKonselor::create($request->validated());

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'JadwalKonselor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwalKonselor = JadwalKonselor::find($id);

        return view('jadwal-konselor.show', compact('jadwalKonselor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwalKonselor = JadwalKonselor::find($id);
        $konselor = Konselor::all();

        return view('jadwal-konselor.edit', compact('jadwalKonselor', 'konselor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalKonselorRequest $request, JadwalKonselor $jadwalKonselor)
    {
        $jadwalKonselor->update($request->validated());

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'JadwalKonselor updated successfully');
    }

    public function destroy($id)
    {
        JadwalKonselor::find($id)->delete();

        return redirect()->route('jadwal-konselors.index')
            ->with('success', 'JadwalKonselor deleted successfully');
    }
}
