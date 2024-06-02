<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pasien;
use App\Models\Konselor;
use Illuminate\Http\Request;
use App\Models\JadwalKonselor;
use App\Models\JanjiKonseling;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $janjiKonselings = JanjiKonseling::orderBy('status_janji', 'ASC')->paginate();
        $konselors = Konselor::all();

        return view('janji-konseling.index', compact('janjiKonselings', 'konselors'))
            ->with('i', (request()->input('page', 1) - 1) * $janjiKonselings->perPage());
    }

    public function janjikonselor(){
        //ambil id usernya
        $id_user = Auth::user()->id;

        //ambil data konselornya
        $konselor = Konselor::where('id_user', $id_user)->first();
        $id_konselor = $konselor->id_konselor;

        $janjiKonselings = JanjiKonseling::where('id_konselor',$id_konselor)->orderBy('status_janji', 'ASC')->get();

        return view('janji-konseling.janjikonselor', compact('janjiKonselings'));
    }

    public function detailbykonselor($id){
        $janjiKonseling = JanjiKonseling::find($id);

        return view('janji-konseling.detailbykonselor', compact('janjiKonseling'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id_konselor = $id;
        $janjiKonseling = new JanjiKonseling();
        $jadwalkonselors = JadwalKonselor::where('id_konselor','=', $id_konselor)->get();
        $pasiens = Pasien::all();

        return view('janji-konseling.create', compact('janjiKonseling', 'jadwalkonselors', 'pasiens', 'id_konselor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JanjiKonselingRequest $request) 
    {
        //deklarasi variable
        $id_jadwalkonselor = $request->id_jadwalkonselor;
        $id_pasien = $request->id_pasien;

        //ambil jadwal untuk mengecek apakah tanggalnya sesuaid dengan jadwal atau tidak
        $jadwalkonselor = JadwalKonselor::with('konselor')->find($id_jadwalkonselor);
        $jadwal_hari = $jadwalkonselor->hari;
        $jadwal_jam = $jadwalkonselor->jam;
        $jadwal_namakonselor = $jadwalkonselor->konselor->nama_konselor;
        $id_konselor = $jadwalkonselor->id_konselor;


        $tgl_janjikonseling = Carbon::parse($request->tgl_janji_konseling)->format('Y-m-d');

        //jika kondisi sudah terpenuhi lanjut proses input dalam table
        $validated = [
            'id_jadwalkonselor' => $id_jadwalkonselor,
            'id_pasien' => $id_pasien,
            'id_konselor' => $id_konselor,
            'nama_konselor' => $jadwal_namakonselor,
            'hari' => $jadwal_hari,
            'jam' => $jadwal_jam,
            'status_janji' => 'DIJADWALKAN',
            'tgl_janji_konseling' => $tgl_janjikonseling
        ];

        // dd($validated);

        JanjiKonseling::create($validated);

        return redirect()->route('janji-konselings.index')
            ->with('success', 'Janji Konseling berhasil dibuat!.');
    }


    //codingan lama yang ada validasi jadwalnya
    public function store_backup(JanjiKonselingRequest $request)
    {
        //deklarasi variable
        $id_konselor = $request->id_konselor;
        $id_jadwalkonselor = $request->id_jadwalkonselor;
        $id_pasien = $request->id_pasien;

        //ambil jadwal untuk mengecek apakah tanggalnya sesuaid dengan jadwal atau tidak
        $jadwalkonselor = JadwalKonselor::find($id_jadwalkonselor);
        $jadwal_hari = $jadwalkonselor->hari;

        $selectedHari = Carbon::parse($request->tgl_janji_konseling)->locale('id')->dayName;
        if($selectedHari != $jadwal_hari){
            return redirect()->action([JanjiKonselingController::class, 'create'], ['id' => $id_konselor])->with('error', 'Tanggal yang dipilih tidak sesuai jadwal!');
        }

        $tgl_janjikonseling = Carbon::parse($request->tgl_janji_konseling)->format('Y-m-d');

        //jika kondisi sudah terpenuhi lanjut proses input dalam table
        $validated = [
            'id_jadwalkonselor' => $id_jadwalkonselor,
            'id_pasien' => $id_pasien,
            'status_janji' => 'DIJADWALKAN',
            'tgl_janji_konseling' => $tgl_janjikonseling
        ];

        // dd($validated);

        JanjiKonseling::create($validated);

        return redirect()->route('janji-konselings.index')
            ->with('success', 'Janji Konseling berhasil dibuat!.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id_janjikonseling = decrypt($id);
        $janjiKonseling = JanjiKonseling::find($id_janjikonseling);

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
            ->with('success', 'Janji Konseling berhasil diperbarui');
    }

    public function destroy($id)
    {
        JanjiKonseling::find($id)->delete();

        return redirect()->route('janji-konselings.index')
            ->with('success', 'Janji Konseling berhasil di hapus!');
    }

    public function getjadwal(Request $request){
        $idKonselor = $request->input('id_konselor');

        $jadwalKonselor = JadwalKonselor::where('id_konselor', '=', $idKonselor)->get();

        return response()->json($jadwalKonselor);
    }

    public function pilihkonselor(Request $request){

        $konselors = DB::table('jadwal_konselor')
                    ->leftJoin('konselor','jadwal_konselor.id_konselor','=','konselor.id_konselor')
                    ->select('jadwal_konselor.hari', 'jadwal_konselor.jam', 'konselor.id_konselor', 'konselor.nama_konselor')
                    ->groupBy('konselor.id_konselor')
                    ->get();

        if(isset($request->id_konselor)){
            return redirect()->action(
                [JanjiKonselingController::class, 'create'],
                ['id' => $request->id_konselor]
            );
        }

        return view('janji-konseling.pilihkonselor', compact('konselors'));
    }
}
