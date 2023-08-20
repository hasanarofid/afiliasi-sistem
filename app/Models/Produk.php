<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
     protected $table = 'produk';

  public static function kode($kode)
    {
         $lastProduct = self::latest()->first();

            // $lastNumber = $lastProduct ? intval(substr($lastProduct->product_code, -3)) : 0;
            // $nextNumber = $lastNumber + 1;

            // $product->product_code = 'PD' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            $kodegenerate = $kode .  str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
           
        return $kodegenerate;

    }
}
