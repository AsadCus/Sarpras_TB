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
            background-color: #3b48ff;
            color: white;
        }
    </style>
</head>
<body>
    <center>
    <h2>Rekap Data Barang</h2>
    </center>
    <table id="barang" width="100%">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Spesifikasi</th>
            <th>Gambar Barang</th>
            <th>Tanggal DiBuat</th>
            <th>Tanggal DiUpdate</th>
        </tr>
        </thead>
        @php
          $no=1;
      @endphp
        @foreach ( $barang as $item )
            <tbody>
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->spesifikasi }}</td>
                <td><img src="img/{{ $item->foto_barang }}" alt="" width="60px"></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
            </tr>
            </tbody>
        @endforeach
    
    </table>
    
    
</body>
</html>