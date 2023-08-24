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
        $data['responden'] = $responden;
        $data['jawaban'] = Jawaban::where('respondens_id', $responden->id)->get();
        return view('responden.detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responden $responden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responden $responden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responden $responden)
    {
        //
    }
}
