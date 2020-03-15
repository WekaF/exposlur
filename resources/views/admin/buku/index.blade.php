@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop

@extends('admin.layouts.main')

@section('content')
          <div class="card">
          <h4 class="card-title"><strong>Tambah</strong> Buku</h4>
          <div class="col-lg-2">
            <a href="{{ route('buku.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Buku</a>
          </div>

          <div class="card-body">

            <table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
              <thead>
                <tr>
                <th>ISBN</th>
			        	<th>Judul Buku</th>
			        	<th>Kategori Buku</th>
			        	<th>Nama Pengarang</th>
			        	<th>Penerbit</th>
			        	<th>Tahun Terbit</th>
			        	<th>Stok</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
		            	@foreach($bukus as $b)
		            		<tr>
		            			<td>{{ $b->isbn }}</td>
		            			<td>{{ $b->judul }}</td>
		            			<td>{{ $b->kategori->kategori }}</td>
		            			<td>{{ $b->pengarang }}</td>
		            			<td>{{ $b->penerbit }}</td>
		            			<td>{{ $b->tahun }}</td>
		            			<td>{{ $b->stok }}</td>
                           
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('buku.edit', $b->id)}}"> Edit </a>
                            <form action="{{ route('buku.destroy', $b->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection