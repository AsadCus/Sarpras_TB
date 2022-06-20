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
            font-size: 12.5px;
            margin-left: -2.1rem;
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
            background-color: #3b96ff;
            color: white;
        }
    </style>
</head>
<body>
    <center>
    <h2>Rekap Data Pengembalian</h2>
    </center>
    <table id="barang" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Nama Peminjam</th>
            <th>Nama Pengembali</th>
            <th>Status Peminjam</th>
            <th>Nama Operator</th>
            <th>Nama Kelas</th>
            <th>Jumlah Pinjam</th>
            <th>Keterangan</th>
            <th>DiPinjam</th>
            <th>DiKembalikan</th>
        </tr>
        </thead>
        @php
          $no=1;
      @endphp
        @foreach ( $data as $item )
            <tbody>
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->nama_pengembali }}</td>
                <td>{{ $item->status_peminjam }}</td>
                <td>{{ $item->operator->nama_op }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->created_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
                <td>{{ $item->updated_at->isoFormat('dddd, D MMMM Y, hh:mm:ss'); }}</td>
            </tr>
            </tbody>
        @endforeach
    
    </table>
    
    
</body>
</html>