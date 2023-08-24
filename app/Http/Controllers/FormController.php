<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
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
        $form = Form::create([
            'id' => Str::orderedUuid(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        return response()->json($form, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        return response()->json($form, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        $form->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        $form->delete();
    }
}
