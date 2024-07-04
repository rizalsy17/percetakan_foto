<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TransaksiPercetakan extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'transaksi_percetakan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'type',
        'kode_transaksi',
        'tanggal_masuk',
        'alat_id',
        'jumlah',
        'supplier_id',
    ];

  
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
   
    public function alat()
    {
        return $this->belongsTo(Barang::class, 'alat_id');
    }
}
