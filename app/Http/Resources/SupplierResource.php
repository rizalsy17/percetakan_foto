<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_supplier' => $this->nama_supplier,
            'perusahaan' => $this->perusahaan,
            'telepon' => $this->telepon,
            'domisili' => $this->domisili,
            'alamat' => $this->alamat,
            // Remove or comment out relationships for now
            // 'barangs' => BarangResource::collection($this->whenLoaded('barangs')),
            // 'transaksi_percetakan' => TransaksiPercetakanResource::collection($this->whenLoaded('transaksi_percetakan')),
            // 'transaksi_barang_atk' => TransaksiBarangAtkResource::collection($this->whenLoaded('transaksi_barang_atk')),
        ];
    }
}
