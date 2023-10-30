<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-4">
    @if(Session::has('pesan'))
    <div class="bg-green-400 text-white p-4 rounded-md relative">
        {{ Session::get('pesan') }}
        <button class="absolute top-0 right-0 mt-1 mr-4 mb 2 text-4xl text-red-600 hover:text-red-800 rounded-full" onclick="this.parentElement.style.display = 'none'">&times;</button>
    </div>
@endif
      <br>
        <h1 class="text-3xl font-semibold text-center mb-6 bg-gray-200 py-2">Daftar Buku</h1>
        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md">
            <!-- <thead class="bg-gray-200">
            <form action="{{ route('search') }}" method="GET">
            <div class="input-group">
             <input type="text" name="kata" class="form-control" placeholder="Cari buku...">
            <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">Cari</button> -->
            
             </span>
            </div>
            </form>
            <br>
                <tr>
                    <th class="px-2 py-2 border border-gray-300">No.</th>
                    <th class="px-4 py-2 border border-gray-300">Judul Buku</th>
                    <th class="px-4 py-2 border border-gray-300">Penulis</th>
                    <th class="px-4 py-2 border border-gray-300">Harga</th>
                    <th class="px-4 py-2 border border-gray-300">Tgl. Terbit</th>
                    <th class="px-4 py-2 border border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($data_buku as $index => $buku)
                <tr>
                    <!-- agar nomor beraturan -->
                    <td class="px-2 py-2 border border-gray-300">{{ $index + $data_buku ->firstitem() }}</td> 
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->judul }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->penulis }}</td>
                    <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($buku->harga, 2,',','.') }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $buku->tgl_terbit }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        <a href="{{ route('buku.edit', $buku->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau dihapus?')" class="text-red-500 hover:text-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
         {{ $data_buku->links() }}
        </div>

        <div class="mt-6 p-4 bg-white shadow-md">
            <p class="text-lg">Jumlah buku yang tersedia: {{ $jumlah_buku }}</p>
            <p class="text-lg">Total harga dari seluruh buku: Rp {{ number_format($total_harga, 2,',','.') }}</p>
        </div>
        <br>
        <a href="{{ route('buku.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Buku</a>


    </div>
</body>
</html>

