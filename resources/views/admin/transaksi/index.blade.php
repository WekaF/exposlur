@extends('admin.layouts.main')

@section('content')

          <div class="card">
          <div class="col-lg-2">
            <a href="{{ route('transaksi.pdf') }}" class="btn btn-warning btn-rounded btn-fw"><i class="fa fa-plus"></i> Cetak <i>PDF</i></a>
          </div>
          <div class="card-body">

            <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
              <thead>
                <tr>
                <th>No</th>
			      		<th>Nama Peminjam</th>
			      		<th>Judul Buku</th>
			      		<th>Tanggal Pinjam</th>
			      		<th>Tanggal Kembali</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
	        			@foreach($transaksis as $t)
	        				<tr class="odd gradeX">
	        					<td>{{ $no++ }}</td>
	        					<td>{{ $t->user->name }}</td>
	        					<td>{{ $t->bukus->judul }}</td>
	        					<td>{{ $t->tgl_pinjam }}</td>
	        					<td>{{ $t->tgl_kembali }}</td>
	        				</tr>
	        			@endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection