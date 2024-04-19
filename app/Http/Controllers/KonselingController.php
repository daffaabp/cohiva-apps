<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Http\Requests\KonselingRequest;
use App\Models\Konselor;
use App\Models\Pasien;
use Illuminate\Support\Facades\Validator;

/**
 * Class KonselingController
 * @package App\Http\Controllers
 */
class KonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konselings = Konseling::paginate();

        return view('konseling.index', compact('konselings'))
            ->with('i', (request()->input('page', 1) - 1) * $konselings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konseling = new Konseling();

        return view('konseling.create', compact('konseling'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KonselingRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_konseling' => 'required',
            'status_pasien' => 'required',
            'keluhan' => 'required',
            'penilaian' => 'required',
            'keterangan' => 'required',
            'jenis_konseling' => 'required',
            'status_konseling' => 'required'
        ]);

        if($validator->fails()){
            return redirect('konselings.create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $validated = $validator->validate();
        $validated['id_pasien'] = 1; //input menggunakan dummy karna belum terkoneksi dengan login konselor
        $validated['id_konselor'] = 1; //input menggunakan dummy karna belum terkoneksi dengan login konselor

        Konseling::create($validated);

        return redirect()->route('konselings.index')
            ->with('success', 'Konseling berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $konseling = Konseling::find($id);

        return view('konseling.show', compact('konseling'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konseling = Konseling::find($id);

        return view('konseling.edit', compact('konseling'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KonselingRequest $request, Konseling $konseling)
    {
        $konseling->update($request->validated());

        return redirect()->route('konselings.index')
            ->with('success', 'Konseling berhasil diperbarui');
    }

    public function destroy($id)
    {
        Konseling::find($id)->delete();

        return redirect()->route('konselings.index')
            ->with('success', 'Konseling berhasil dihapus!');
    }
}
