@extends('layouts.master')
@section('title','Tambah Produk')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Tambah Produk</a></li>

@endsection

@section ('content')
 <div class="container-fluid py-2">
 

       <div class="row">
         <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                     <div class="row">
                     <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Form Tambah Produk</h6>
                     </div>
                     
                     </div>
                  </div>
               <div class="card-body ">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    {{ Session::forget('success') }}
@endif
              
               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                     <form action="{{ route('produk.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                              <label for="name">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Produk" required>
                     </div>

                       <div class="form-group">
                              <label for="name">Kode Depan</label>
                              <input type="text" class="form-control" name="kode_depan" id="kode_depan" placeholder="Kode Produk" required>
                     </div>

                     

                     <div class="form-group">
                        <label for="nip">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga">
                     </div>
             

                     <div class="form-group">
                        <label for="pangkat">Komisi</label>
                        <div class="input-group">
                           <input type="text" class="form-control" name="komisi" id="komisi" placeholder="Enter a value">
                           <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="button">%</button>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="gol_ruang">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="foto">
                     </div>
                     
                    

                     <div class="d-flex">
                        <button type="submit" class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2 " data-class="bg-white" >Save</button>
                     </div>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
 </div>
@endsection
       @section('js')

       @endsection

