<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Http\Requests\PasienRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class PasienController
 * @package App\Http\Controllers
 */
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::paginate();

        return view('pasien.index', compact('pasiens'))
            ->with('i', (request()->input('page', 1) - 1) * $pasiens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasien = new Pasien();
        return view('pasien.create', compact('pasien'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PasienRequest $request)
    {
        $validated = $request->validated();
        $validated['id_user'] = Auth::user()->id;

        Pasien::create($validated);

        //kalau pasien nanti di redirect ke home
        if(Auth::user()->hasRole('Pasien')){
            return redirect()->route('info_hiv')
                ->with('success', 'Berhasil mengisi data pasien.');
        }
        
        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);

        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);

        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PasienRequest $request, Pasien $pasien)
    {
        $pasien->update($request->validated());

        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien updated successfully');
    }

    public function destroy($id)
    {
        Pasien::find($id)->delete();

        return redirect()->route('pasiens.index')
            ->with('success', 'Pasien deleted successfully');
    }
}
