@extends('layouts.master')
@section('title','Dashboard')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Products</a></li>

@endsection
@section ('content')
  

 <div class="container-fluid py-4">
       <div class="row">
        <div class="col-12">
          <div class="card mb-4">
          <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Products </h6>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
     

                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a  class="btn btn-sm bg-primary text-white " href="{{  route('produk.add')  }}"><i class="fas fa-plus" aria-hidden="true"></i> Tambah </a>
                    </div>
                   


                    

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
              <div class="table-responsive p-0">
          @foreach ($produks as $produk)
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="card-body">
                        <h3 class="card-title">{{ $produk->nama }} - {{  $produk->kode }}</h3>
                        <h5 class="text-secondary opacity-5">Rp {{ number_format($produk->harga)  }}</h5>
                    </div>
                    <img src="{{ asset('/storage/'.$produk->foto) }}" class="card-img-top" alt="{{ $produk->nama }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $produk->komisi }} % </h6>
                        <div >
                           <a href="{{  route('produk.edit',array('id'=>$produk->id))  }}" class="btn btn-info">Edit</a>
                           <a href="{{  route('produk.hapus',array('id'=>$produk->id))  }}" class="btn btn-danger"> hapus</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
     </div>
            </div>
          </div>
        </div>
      </div>
 </div>
@endsection

