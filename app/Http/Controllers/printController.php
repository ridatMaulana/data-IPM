<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Jawaban;

class printController extends Controller
{
    public function index(){
        $data['jawaban'] = Jawaban::all();
        $data['pertanyaan'] = Pertanyaan::all();
        return view('jawaban.index')->with($data);
    }
}
