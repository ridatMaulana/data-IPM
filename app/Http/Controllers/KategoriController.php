<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('kategori.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = null;
        return view('kategori.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create([
            'judul' => $request->judul,
            'forms_id' => $request->forms_id
        ]);
        $notification = array(
            'message' => 'Data Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return response()->json($kategori, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $data['kategori'] = $kategori;
        return view('kategori.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($request->all());
        $notification = array(
            'message' => 'Data Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori.index')->with($notification);
    }
}
