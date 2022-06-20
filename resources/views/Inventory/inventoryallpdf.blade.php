<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        
    <style>
        #barang {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            align-items: center;
        }
    
        #barang td, #barang th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        #barang tr:nth-child(even){background-color: #f2f2f2;}
    
        #barang tr:hover {background-color: #ddd;}
    
        #barang th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #ffb13b;
            color: white;
        }
    </style>
</head>
<body>
    <center>
    <h2>Rekap Data Inventory</h2>
    </center>
    <table id="barang" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Jumlah Tersedia</th>
            <th>Jumlah Rusak</th>
            <th>Jumlah Terpinjam</th>
            <th>Tanggal DiBuat</th>
            <th>Tanggal DiUpdate</th>
        </tr>
        </thead>
        @php
          $no=1;
      @endphp
        @foreach ( $inventory as $item )
            <tbody>
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->barang->kode_barang }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->jumlah_tersedia }}</td>
                <td>{{ $item->jumlah_rusak }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td>{{ $item->created_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
                <td>{{ $item->updated_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
            </tr>
            </tbody>
        @endforeach
    
    </table>
    
    
</body>
</html>