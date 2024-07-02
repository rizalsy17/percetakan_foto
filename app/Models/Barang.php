<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Helpers\FormatHelper;

class Barang extends Model
{
    use HasFactory,HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'id_supplier',
        'harga_jual',
        'harga_beli',
        'stok',
        'satuan',
        'keterangan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode_barang = FormatHelper::generateKodeBarang();
        });
    }

    private static function generateKodeBarang()
    {
        $randomLetter = chr(rand(97, 122)); // Generate random letter from a-z
        $randomNumber = rand(100000, 999999); // Generate random 6-digit number
        return strtoupper($randomLetter) . '-' . $randomNumber;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

}
