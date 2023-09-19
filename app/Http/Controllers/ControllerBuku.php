<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;  
class ControllerBuku extends Controller
{
    
    public function index(){
        $data_buku = Buku::all();
        $no = 0;
        $total_harga = DB::table('buku')->sum('harga');
        $jumlah_buku = $data_buku->count();
        return view('index', compact('data_buku', 'total_harga', 'no', 'jumlah_buku'));
    }
}