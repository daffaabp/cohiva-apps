<?php

namespace App\Http\Controllers;

use App\Models\JanjiKonseling;
use App\Http\Requests\JanjiKonselingRequest;

/**
 * Class JanjiKonselingController
 * @package App\Http\Controllers
 */
class JanjiKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $janjiKonselings = JanjiKonseling::paginate();

        return view('janji-konseling.index', compact('janjiKonselings'))
            ->with('i', (request()->input('page', 1) - 1) * $janjiKonselings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $janjiKonseling = new JanjiKonseling();
        return view('janji-konseling.create', compact('janjiKonseling'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JanjiKonselingRequest $request)
    {
        JanjiKonseling::create($request->validated());

        return redirect()->route('janji-konselings.index')
            ->with('success', 'JanjiKonseling created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $janjiKonseling = JanjiKonseling::find($id);

        return view('janji-konseling.show', compact('janjiKonseling'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $janjiKonseling = JanjiKonseling::find($id);

        return view('janji-konseling.edit', compact('janjiKonseling'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JanjiKonselingRequest $request, JanjiKonseling $janjiKonseling)
    {
        $janjiKonseling->update($request->validated());

        return redirect()->route('janji-konselings.index')
            ->with('success', 'JanjiKonseling updated successfully');
    }

    public function destroy($id)
    {
        JanjiKonseling::find($id)->delete();

        return redirect()->route('janji-konselings.index')
            ->with('success', 'JanjiKonseling deleted successfully');
    }
}
