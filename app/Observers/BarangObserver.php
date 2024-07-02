<?php

namespace App\Observers;

use App\Models\Barang;

class BarangObserver
{
    /**
     * Handle the Barang "created" event.
     */
    public function created(Barang $barang): void
    {
        //
    }
    public function creating(Barang $barang)
    {
        $barang->kode_barang = $this->generateKodeBarang();
    }

    private function generateKodeBarang()
    {
        $randomLetter = chr(rand(97, 122)); // Generate random letter from a-z
        $randomNumber = rand(100000, 999999); // Generate random 6-digit number
        return strtoupper($randomLetter) . '-' . $randomNumber;
    }
    /**
     * Handle the Barang "updated" event.
     */
    public function updated(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "deleted" event.
     */
    public function deleted(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "restored" event.
     */
    public function restored(Barang $barang): void
    {
        //
    }

    /**
     * Handle the Barang "force deleted" event.
     */
    public function forceDeleted(Barang $barang): void
    {
        //
    }
}
