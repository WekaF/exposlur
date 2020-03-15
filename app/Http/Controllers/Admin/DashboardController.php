<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buku;
use App\User;
use App\Transaksi;
use App\Kategori;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['member'] = User::where('id_role', 2)->count();
        $data['bukus'] =  Buku::with('kategori')->count();
        $data['transaksis'] = Transaksi::count();
        $data['kategoris'] = Kategori::count();

        
        return view('admin.dashboard.index', $data);
    }
}
