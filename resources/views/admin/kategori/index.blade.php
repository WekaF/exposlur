@extends('admin.layouts.main')

@section('content')
<div class="main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body"><div class="col-md-6 col-lg-4">
                   
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-large">Tambah Kategori</button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="modal-large" tabindex="-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="POST" enctype="multipart/form-data" action="{{ route('kategori_create') }}">
                        @csrf
                        
                        <div class="form-group">
                          <label class="control-label col-md-12 col-sm-12 col-xs-12" for="name">Nama Buku <span class="required">*</span>
                          </label>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" id="judul" name="judul" required="required" class="form-control col-md-12 col-xs-12">
                          </div>
                        </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-bold btn-pure btn-primary">Simpan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                               
                <table class="table">
                  <thead>
                  <tr>
                          <th>ID</th>
                          <th>Kategori Buku</th>
                         
                          <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                        @php
                            $no = 1;
                        @endphp
		            	@foreach($kategoris as $k)
		            		<tr class="odd gradeX">
		            			<td>{{ $no++ }}</td>
					            <td>{{ $k->kategori }}</td>
                                <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('kategori_edit', $k->id)}}"> Edit </a>
                            <form action="{{ route('kategori_delete', $k->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
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
          </div>

          
        </div>


</div>




    @endsection