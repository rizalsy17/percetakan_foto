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
    <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($endDate)->translatedFormat('d F Y') }}</p>
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
                <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($transaksi->tanggal_masuk)->translatedFormat('d F Y') }}</td>
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
