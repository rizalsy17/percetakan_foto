<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AlatPercetakan extends Model
{
    use HasFactory,HasUuids;

    
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'stok',
        'harga',
        'id_supplier',
        'keterangan',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    public function transaksi_percetakan()
    {
        return $this->hasMany(TransaksiPercetakan::class, 'alat_id');
    }
}
