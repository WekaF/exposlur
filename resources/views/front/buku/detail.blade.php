@extends('front.layouts.main')

@section('title', 'Transaksi')
	
@section('contents')
	<!-- Breadcrumb -->
	<section class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Detail Buku</h1>
					<ol class="breadcrumb bc-3">
						<li>
							<a href="{{ route('home') }}"><i class="entypo-home"></i>Home</a>
						</li>
						<li class="active">
							<strong>{{ $bukus->judul }}</strong>
						</li>
					</ol>			
				</div>
			</div>
		</div>
	</section>


	<!-- About Us Text -->
	<section class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<a href="#">
						<img src="{{ asset('uploaded/buku') }}/{{ $bukus->image }}" style="width: 300px; height: 350px" class="img-rounded" />
					</a>
				</div>
				<div class="col-sm-7">
					<h3>{{ $bukus->judul }}</h3>
					<br />
					<table class="table">
						<tr>
							<td style="font-weight: bold;">Pengarang</td>
							<td>{{ $bukus->pengarang }}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Penerbit</td>
							<td>{{ $bukus->penerbit }}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Kategori Buku</td>
							<td>{{ $bukus->kategori->kategori }}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Tahun Terbit</td>
							<td>{{ $bukus->tahun }}</td>
						</tr>
						<tr>
							<td style="font-weight: bold;">Stok Buku</td>
							<td>{{ $bukus->stok }}</td>
						</tr>
					</table>
					@if (Auth::check())
						@if (Auth::user()->id_role == 2)
							@if (count($check) > 0)
							<button disabled="disabled" class="btn btn-danger">Buku sudah dipinjam</button>
							@else
							<a href="{{ route('home_pinjam', ['id' => $bukus->id]) }}" class="btn btn-primary">Pinjam Buku</a>
							@endif
						@endif
					@endif
				</div>
			</div>
		</div>	
	</section>
@endsection