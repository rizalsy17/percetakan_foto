<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang</title>
    <style>
        /* Tambahkan gaya CSS sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Barang</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>ID Supplier</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Keterangan</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->id_supplier }}</td>
                <td>{{ $barang->harga_jual }}</td>
                <td>{{ $barang->harga_beli }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->satuan }}</td>
                <td>{{ $barang->keterangan }}</td>
                <td>{{ $barang->created_at }}</td>
                <td>{{ $barang->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
