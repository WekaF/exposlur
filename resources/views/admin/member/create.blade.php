@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('admin.layouts.main')

@section('content')

<form method="POST" action="{{ route('member.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah member baru</h4>
                      
                        <div class="form-group">
                            <label for="judul" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isbn" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="email"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengarang" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select name="id_role" class="form-control">
								<option value="2">User</option>
								<option value="1">Admin</option>
							</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penerbit" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="image">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>



@endsection