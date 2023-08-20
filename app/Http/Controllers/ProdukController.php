<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    //index
    public function index(){
        $produks = Produk::get();
        return view('produk.index',compact('produks'));
    }

    //add
    public function add(){
        return view('produk.add');
    }

    //save data
    public function store(Request $request){
        $imagepath = $request->foto->store('products','public');
        $kode = Produk::kode(request('kode_depan'));
        // dd($kode);
         $product = new Produk();
        $product->nama=request('nama');
        $product->harga=request('harga');
        $product->komisi=request('komisi');
        $product->foto=$imagepath;
        $product->kode=$kode;


        $product->save();
        return redirect()->route('produk.index')->with('success','Successfully add the product!');

    }

    //update data
    public function update($id,Request $request){
        // dd($request);
         $model = Produk::find($id);
        
         if($request->foto){
             $imagepath = $request->foto->store('products','public');
              $model->foto=$imagepath;
         }
         $model->nama=request('nama');   
        $model->harga=request('harga');
        $model->komisi=request('komisi');
           $model->save();
             return redirect()->route('produk.index')->with('success','Successfully update the product!');

    }


        //edit
    public function edit($id){
        // dd($id);
         $model = Produk::find($id);
        //  dd($model);die;

         return view('produk.edit',compact('model'));
    }

        //edit
    public function hapus($id){
        // dd($id);
         $model = Produk::find($id)->delete();
        //  dd($model);die;

        return redirect()->route('produk.index')->with('success','Successfully hapus the product!');
    }
}
