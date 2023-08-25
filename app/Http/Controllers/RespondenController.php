<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use App\Models\Jawaban;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['responden'] = Responden::all();
        return view('responden.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Responden $responden)
    {
        $data['rest'] = $responden->get();
        $data['jawaban'] = Jawaban::where('respondens_id', $responden->id)->get();
        // dd($data['rest']);
        return view('responden.detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responden $responden)
    {
        $data['responden'] = $responden;
        return view('responden.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responden $responden)
    {
        $responden->update($request->all());
        $notification = array(
            'message' => 'Data Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('responden.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responden $responden)
    {
        //
    }
}
