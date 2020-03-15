@extends('admin.layouts.main')

@section('content')

       

	        
<div class="row">





<div class="col-6 col-lg-3">
            <div class="card card-body ">
              <h6 class="text-uppercase text-gray">Total User</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-user text-gray fs-30"></span>
                <span class="fs-30">{{ $member }}</span>
              </div>
            </div>
          </div>



          <div class="col-6 col-lg-3">
            <div class="card card-body bg-gray">
              <h6 class="text-uppercase text-white">Buku</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-book text-white fs-30"></span>
                <span class="fs-30">{{ $bukus }}</span>
              </div>
            </div>
          </div>




          <div class="col-6 col-lg-3">
            <div class="card card-body bg-danger">
              <h6 class="text-uppercase text-white">Transaksi</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-dollar fs-30"></span>
                <span class="fs-30">{{$transaksis}}</span>
              </div>
            </div>
          </div>



          <div class="col-6 col-lg-3">
            <div class="card card-body bg-info">
              <h6 class="text-uppercase text-white">Kategori Buku</h6>
              <div class="flexbox mt-2">
                <span class="fa fa-refresh fs-30"></span>
                <span class="fs-30">{{$kategoris}}</span>
              </div>
            </div>
		  </div>
		  
<div class="col-12">
  <div class="divider text-uppercase fw-500">Social</div>
</div>

</div>

@endsection























