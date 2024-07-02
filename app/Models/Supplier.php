<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Supplier extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_supplier',
        'perusahaan',
        'telepon',
        'domisili',
        'alamat',
    ];

  

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'id_supplier');
    }
}
