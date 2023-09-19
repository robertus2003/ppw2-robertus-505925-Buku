<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border border-gray-300">No.</th>
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">Judul Buku</th>
                    <th class="p-2 border border-gray-300">Penulis</th>
                    <th class="p-2 border border-gray-300">Harga</th>
                    <th class="p-2 border border-gray-300">Tgl. Terbit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 0;
                @endphp
                @foreach ($data_buku as $buku)
                <tr>
                    <td class="p-2 border border-gray-300">{{ ++$no }}</td>
                    <td class="p-2 border border-gray-300">{{ $buku->id }}</td>
                    <td class="p-2 border border-gray-300">{{ $buku->judul }}</td>
                    <td class="p-2 border border-gray-300">{{ $buku->penulis }}</td>
                    <td class="p-2 border border-gray-300">Rp {{ number_format($buku->harga, 2) }}</td>
                    <td class="p-2 border border-gray-300">{{ $buku->tgl_terbit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 p-4 border-t border-gray-300">
            <p class="text-lg">Banyak buku yang tersedia: {{ $jumlah_buku }}</p>
            <p class="text-lg">Harga keseluruhan dari seluruh buku: Rp {{ number_format($total_harga, 2) }}</p>
        </div>
    </div>
</body>
</html>