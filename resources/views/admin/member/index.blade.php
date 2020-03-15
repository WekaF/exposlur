@extends('admin.layouts.main')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('member.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Buku</a>
  </div>
        </div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title pull-left">Data Buku</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                      	<th>No</th>
		                		<th>Nama</th>
		                		<th>Email</th>
		                		<th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
	                  			$no = 1;
	                  		 ?>
	                  		@foreach($member as $m)
	                  			<tr class="odd gradeX">
	                  				<td width="10px">{{ $no++ }}</td>
	                  				<td>{{ $m->name }}</td>
	                  				<td>{{ $m->email }}</td>
	                  				<td>{{ $m->role->nama_role }}</td>
                           
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('member.edit', $m->id)}}"> Edit </a>
                            <form action="{{route('member.destroy', $m->id)}}" class="pull-left"  method="post">
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
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection