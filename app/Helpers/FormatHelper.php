<?php

namespace App\Helpers;

class FormatHelper
{
    public static function generateKodeBarang()
    {
        $randomLetter = chr(rand(97, 122)); // Generate random letter from a-z
        $randomNumber = rand(100000, 999999); // Generate random 6-digit number
        return strtoupper($randomLetter) . '-' . $randomNumber;
    }
}
