<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Http\Requests\KonselorRequest;
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
        //create random number for id_konselor
        $id_konselor = random_int(1, 999999);

        $validator = Validator::make($request->all(),[
            'nama_konselor' => 'required',
            'notelpon_konselor'=>'required',
            'unit_kerja'=>'required',
            'foto_konselor' =>'mimes:jpg,png|max:2048',
            'is_aktif' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('konselors.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $validated = $validator->validated();
        $validated['id_konselor'] = $id_konselor;

        //get request file
        $file = $request->file('foto_konselor');
        $extension = $file->getClientOriginalExtension();
        $filename = 'id_'.$id_konselor.'.'.$extension; //get file original name
        $savefilename = 'id_'.$id_konselor.'.'.$file->getClientOriginalExtension(); //save with id konselor
        $path = 'foto_konselor/'.$savefilename;

        Storage::disk('public')->put($path, file_get_contents($file)); //save file to storage folder
        $validated['foto_konselor'] = trim($filename);

        Konselor::create($validated);

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
        $validator = Validator::make($request->all(),[
            'nama_konselor' => 'required',
            'notelpon_konselor'=>'required',
            'unit_kerja'=>'required',
            'foto_konselor' =>'mimes:jpg,png|max:2048',
            'is_aktif' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->action([KonselorController::class,'edit'],['id_konselor'=>$konselor->id_konselor])
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $validated = $validator->validated();

        //get request file
        $file = $request->file('foto_konselor');
        $extension = $file->getClientOriginalExtension();
        $filename = 'id_'.$konselor->id_konselor.'.'.$extension; //get file original name
        $savefilename = 'id_'.$konselor->id_konselor.'.'.$file->getClientOriginalExtension(); //save with id konselor
        $path = 'foto_konselor/'.$savefilename;

        Storage::disk('public')->put($path, file_get_contents($file)); //save file to storage folder
        $validated['foto_konselor'] = trim($filename);

        $konselor->update($validated);

        
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
