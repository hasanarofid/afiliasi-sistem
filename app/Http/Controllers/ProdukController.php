<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Produk;

class ProdukController extends Controller
{
    //index
    public function index(){
        return view('produk.index');
    }
}
