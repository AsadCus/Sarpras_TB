<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Cetak Barcode</h1>
    <table width="100%">
        <tr>
            @foreach ($barang as $barang)
                <td class="text-center" style="border: 1px solid #333;">
                    <p>{{ $barang->nama_barang }}</p>
                    <img src="data:image/png;base64,{{\DNS2D::getBarcodePNG($barang->kode_barang, 'QRCODE')}}" 
                        alt="{{ $barang->kode_barang }}"
                        width="80" style="margin-bottom: .4rem">
                    <br>
                    {{ $barang->kode_barang }}
                </td>
                @if ($no++ % 3 == 0)
                    </tr><tr>
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>