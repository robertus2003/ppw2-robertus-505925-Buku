<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buku;  
class ControllerBuku extends Controller
{
    
    public function index(){
        $data_buku = Buku::paginate(10); // Menampilkan 10 data per halaman
        $total_harga = DB::table('buku')->sum('harga');
        $jumlah_buku = Buku::count(); // Menghitung jumlah buku tanpa pagination
        return view('index', compact('data_buku', 'total_harga', 'jumlah_buku'));
    }
    
   
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        // Simpan data buku ke dalam database
        Buku::create($validatedData);
    
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Tambahkan');
    }

    public function destroy($id) {

        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Hapus');
  
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        // Temukan buku berdasarkan ID
        $buku = Buku::find($id);
    
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);
    
        // Perbarui data buku
        $buku->update($validatedData);
    
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Edit');
    }
    public function search(Request $request){
        $cari = $request->kata;
        
        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')
                        ->orWhere('penulis', 'like', '%' . $cari . '%')
                        ->paginate(10); // Menampilkan 10 data per halaman
        
        $total_harga = Buku::where('judul', 'like', '%' . $cari . '%')
                          ->orWhere('penulis', 'like', '%' . $cari . '%')
                          ->sum('harga');
        
        $jumlah_buku = Buku::where('judul', 'like', '%' . $cari . '%')
                          ->orWhere('penulis', 'like', '%' . $cari . '%')
                          ->count(); // Menghitung jumlah buku tanpa pagination
    
        return view('index', compact('data_buku', 'total_harga', 'jumlah_buku'));
    }
    
    
    
}




