@extends('admin.layouts.main')

@section('css')
    <style>
        #myToast {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 99999;
        }

        #myToast.hidden {
            display: none;
        }
    </style>
@stop

@section('content')

    <div class="card">
        <div class="col-lg-2">
            <a href="{{ route('transaksi.pdf') }}" class="btn btn-warning btn-rounded btn-fw"><i class="fa fa-plus"></i>
                Cetak <i>PDF</i></a>
        </div>
        <div class="card-body">

            <table class="table table-striped table-bordered" cellspacing="0" id="transaksiTable">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
                </thead>
                <tbody class="tableBody">
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
    <div id="myToast" class="hidden" role="alert"
         aria-live="assertive" aria-atomic="true" data-delay="15000">
        <div class="toast-text alert alert-warning">Notifikasi</div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/lodash.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        function difference(object, base) {
            function changes(object, base) {
                return _.transform(object, function (result, value, key) {
                    if (!_.isEqual(value, base[key])) {
                        result[key] = (_.isObject(value) && _.isObject(base[key])) ? changes(value, base[key]) : value;
                    }
                });
            }

            return changes(object, base);
        }

        let currData =  @json($transaksis);
        let clearTimeoutVar = null;

        async function haha() {
            const {data} = await axios.get('{{route('api.transactions')}}')
            const diff = difference(data, currData)
            console.log(currData, data, diff);

            if (diff.length) {
                clearTimeout(clearTimeoutVar);
                const book = diff[diff.length - 1]
                console.log(book, 'book')
                const status = book.tgl_kembali === 'Masih dipinjam' ? 'meminjam buku' : 'mengembalikan buku'
                $('.toast-text').text(`${book.user.name} ${status} ${book.bukus.judul}`)

                const sound = new Audio('{{asset('audio/beep.mp3')}}')
                sound.play()

                $('#myToast').removeClass('hidden');
                clearTimeoutVar = setTimeout(function () {
                    $('#myToast').addClass('hidden');
                }, 5000);

                $('.tableBody').empty();
                currData = data;
                data.forEach((el, idx) => {
                    $('.tableBody').append(`<tr class="odd gradeX">
                        <td>${idx + 1}</td>
                        <td>${el.user.name}</td>
                        <td>${el.bukus.judul}</td>
                        <td>${el.tgl_pinjam}</td>
                        <td>${el.tgl_kembali}</td>
                    </tr>`)
                })
            }
        }

        setTimeout(haha, 5000);
    </script>
@stop
