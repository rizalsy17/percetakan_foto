<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TransaksiPercetakan extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        
    ];

  
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
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
