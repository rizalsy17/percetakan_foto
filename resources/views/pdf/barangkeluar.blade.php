<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Barang Masuk</h2>
    <p><strong>Periode:</strong> {{ $startDate }} - {{ $endDate }}</p>
    <table>
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Tanggal Masuk</th>
                <th>Barang</th>
                <th>Jumlah Masuk</th>
                <th>User</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaksi)
            <tr>
                <td>{{ $transaksi->kode_transaksi }}</td>
                <td>{{ $transaksi->tanggal_masuk }}</td>
                <td>{{ $transaksi->barang->nama_barang }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>{{ $transaksi->user->name }}</td>
                <td>{{ $transaksi->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
