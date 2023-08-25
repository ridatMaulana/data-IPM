<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Responden;

class printController extends Controller
{
    public function index(){
        $data['respon'] = Responden::all();
        $data['pertanyaan'] = Pertanyaan::all();
        return view('jawaban.index')->with($data);
    }
}
