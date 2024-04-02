<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Http\Requests\KonselorRequest;

/**
 * Class KonselorController
 * @package App\Http\Controllers
 */
class KonselorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konselors = Konselor::paginate();

        return view('konselor.index', compact('konselors'))
            ->with('i', (request()->input('page', 1) - 1) * $konselors->perPage());
    }

    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        $konselor = new Konselor();
        return view('konselor.create', compact('konselor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KonselorRequest $request)
    {
        Konselor::create($request->validated());

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $konselor = Konselor::find($id);

        return view('konselor.show', compact('konselor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konselor = Konselor::find($id);

        return view('konselor.edit', compact('konselor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KonselorRequest $request, Konselor $konselor)
    {
        $konselor->update($request->validated());

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor updated successfully');
    }

    public function destroy($id)
    {
        Konselor::find($id)->delete();

        return redirect()->route('konselors.index')
            ->with('success', 'Konselor deleted successfully');
    }
}
