<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pertanyaan'] = Pertanyaan::all();
        return view('pertanyaan.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = null;
        $data['kategori'] = Kategori::all();
        return view('pertanyaan.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'kategoris_id' => $request->kategoris_id,
            'tipe' => $request->tipe,
            'required' => $request->required,
        ]);
        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('pertanyaan.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        $data['pertanyaan'] = $pertanyaan;
        $data['kategori'] = Kategori::all();
        return view('pertanyaan.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $pertanyaan->update($request->all());
        $notification = array(
            'message' => 'Data Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('pertanyaan.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('pertanyaan.index')->with($notification);
    }
}
