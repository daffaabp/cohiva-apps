<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Konselor;
use App\Models\Konseling;
use App\Models\JanjiKonseling;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KonselingRequest;
use Illuminate\Http\Request;
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

    public function konselingbykonselor(){
        $id_user = Auth::user()->id;
        $konselor = Konselor::where('id_user', $id_user)->first();
        $konselings = Konseling::where('id_konselor', $konselor->id_konselor)->get();

        return view('konseling.konselingbykonselor', compact('konselings'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $janjiKonseling = JanjiKonseling::find($id);
        $konseling = new Konseling();

        return view('konseling.create', compact('konseling', 'janjiKonseling'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KonselingRequest $request)
    {
        $validated = $request->validated();

        $id_janjikonseling = $validated['id_janjikonseling'];

        $janjiKonseling = JanjiKonseling::find($id_janjikonseling);

        $validated['id_pasien'] = $janjiKonseling->id_pasien;
        $validated['id_konselor'] = $janjiKonseling->id_konselor;

        Konseling::create($validated);

        $janjiKonseling->status_janji = "TERLAKSANA";
        $janjiKonseling->save();

        return redirect()->route('konselings.konselingbykonselor')
            ->with('success', 'Konseling berhasil disimpan.');
    }

    public function rekapkonseling(Request $request){
        $rekapkonselings = null;
        $filter_bln = $request->filter_bln;

        if($filter_bln){
            list($tahun, $bulan) = explode('-', $filter_bln);
            $rekapkonselings = DB::table('konseling')
                                ->select(DB::raw('COUNT(id_konseling) as jml_konseling, MONTH(tgl_konseling) as rekap_bln, YEAR(tgl_konseling) as rekap_tahun'))
                                ->whereYear('tgl_konseling', $tahun)
                                ->whereMonth('tgl_konseling', $bulan)
                                ->groupByRaw("MONTH('tgl_konseling')")
                                ->get();
        }

        if ($rekapkonselings && $rekapkonselings->isEmpty()) {
            $rekapkonselings = null;
        } else {
            // Default query if no filter or filter results are found
            $rekapkonselings = $rekapkonselings ?: DB::table('konseling')
                                ->select(DB::raw('COUNT(id_konseling) as jml_konseling, MONTH(tgl_konseling) as rekap_bln, YEAR(tgl_konseling) as rekap_tahun'))
                                ->groupByRaw("MONTH(tgl_konseling), YEAR(tgl_konseling)")
                                ->get();
        }


        return view('konseling.rekapkonseling', compact('rekapkonselings'))                               ;
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
