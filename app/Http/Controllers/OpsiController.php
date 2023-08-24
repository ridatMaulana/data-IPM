<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class OpsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['opsi'] = Opsi::all();
        return view('opsi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = null;
        $data['pertanyaan'] = Pertanyaan::where('tipe','opsi')->get();
        return view('opsi.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Opsi::create([
            'isi' => $request->isi,
            'pertanyaans_id' => $request->pertanyaans_id
        ]);
        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('opsi.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opsi $opsi)
    {

        return response()->json($opsi, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opsi $opsi)
    {
        $data['opsi'] = $opsi;
        $data['pertanyaan'] =  Pertanyaan::where('tipe','opsi')->get();
        return view('opsi.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opsi $opsi)
    {
        $opsi->update($request->all());
        $notification = array(
            'message' => 'Data Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('opsi.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opsi $opsi)
    {
        $opsi->delete();
        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('opsi.index')->with($notification);
    }
}
