@extends('layouts.master')
@section('title','Tambah Produk')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Update Profile Member</a></li>

@endsection

@section ('content')
 <div class="container-fluid py-2">
 

       <div class="row">
         <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                     <div class="row">
                     <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Form Profile Member</h6>
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

<div class="card card-profile">
      <div class="row justify-content-center">
        <div class="col-4 col-lg-4 order-lg-2">
          <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
            <a href="javascript:;">
              <img src="{{  !empty($member->profile_photo_path) ? asset('/storage/'.$member->profile_photo_path):   asset('userdefault.jpg')  }}" class=" img-fluid border-2 border-white">
            </a>
          </div>
        </div>
      </div>

                     <form action="{{ route('profile.edit',array('id'=>$member->id)) }}"
                        method="POST"
                        enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                              <label for="name">Nama</label>
                              <input type="text" class="form-control" value="{{  $member->name  }}" name="name" id="name" placeholder="Nama" required>
                     </div>

                       <div class="form-group">
                              <label for="name">Email</label>
                              <input type="email" class="form-control" value="{{  $member->email  }}"  name="email" id="email" placeholder="email" required>
                     </div>

                     

                     <div class="form-group">
                        <label for="nip">Phone</label>
                        <input type="number" class="form-control" value="{{  $member->phone  }}" name="phone" id="phone" placeholder="phone">
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

