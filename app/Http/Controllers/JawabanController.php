<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Responden;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['opsi'] = Opsi::all();
        $data['kategori'] = Kategori::all();
        $data['pertanyaan'] = Pertanyaan::all();
        return view('main')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Responden::create([
            'nama_desa' => $request->nama_desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'nama' => $request->nama,
            'usia' => $request->usia,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_orangtua' => $request->nama_orangtua,
            'no_induk_kartukeluarga' => $request->no_induk_kartukeluarga,
            'status' => $request->status
        ]);

        $id = Responden::select('id')->where('no_induk_kartukeluarga', $request->no_induk_kartukeluarga)->where('nama', $request->nama)->value('id');
        foreach($request->input('jawaban') as $jawaban){
            Jawaban::create([
                'keterangan' => $jawaban['keterangan'] ?? null,
                'opsis_id' => $jawaban['opsis_id'] ?? null,
                'respondens_id' => $id,
                'pertanyaans_id' => $jawaban['pertanyaans_id']
            ]);
        }

        return view('thank');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jawaban $jawaban)
    {
        return response()->json($jawaban, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jawaban $jawaban)
    {
        return response()->json($jawaban, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jawaban $jawaban)
    {
        $jawaban->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();
    }
}
