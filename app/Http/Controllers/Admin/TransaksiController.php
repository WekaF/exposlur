<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Buku;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, PDF;


class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksis'] = Transaksi::with('bukus', 'user')->get();
        $name = User::pluck('name', 'id');
        $bukus = Buku::get();

        return view('admin.transaksi.index', $data, compact('name', $name))->with('bukus', $bukus);
    }

    public function transactionListApi()
    {
        $trx = Transaksi::with('bukus', 'user')->get();
        return response()->json($trx);
    }

    public function pdf()
    {
        //Get Data
        $data['transaksis'] = Transaksi::with('bukus', 'user')->get();

        //Cetak PDF
        $tgl = date('Y-m-d');
        $nama = 'LogTransaksi-' . $tgl . '.pdf';
        $pdf = PDF::loadView('admin.transaksi.pdf', $data);
        return $pdf->download($nama);
    }
}
