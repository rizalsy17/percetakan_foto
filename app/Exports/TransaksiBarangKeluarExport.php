<?php

namespace App\Exports;

use App\Models\TransaksiBarangAtk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiBarangKeluarExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TransaksiBarangAtk::with('barang', 'supplier', 'user')
            ->where('type','keluar')
            ->whereBetween('tanggal_masuk', [$this->startDate, $this->endDate])
            ->get();
    }

    public function headings(): array
    {
        return [
            'Kode Transaksi',
            'Tanggal Masuk',
            'Barang',
            'Jumlah Masuk',
            'User',
            'Type'
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->kode_transaksi,
            $transaksi->tanggal_masuk,
            $transaksi->barang->nama_barang,
            $transaksi->jumlah,
            $transaksi->user->name,
            $transaksi->type
        ];
    }
}
