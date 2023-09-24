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
   
   
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $buku = Buku::find($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }
}




