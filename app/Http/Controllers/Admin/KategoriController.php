<?php

namespace App\Http\Controllers\Admin;

use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(Request $r) {
        $search = $r->input('search');
		if ($search) {
			$data['kategoris'] = Kategori::where('kategori', 'like', '%'.$search.'%')->paginate();
			return view('admin.kategori.index', $data);
		}

    	$data['kategoris'] = Kategori::paginate(20);

    	return view('admin.kategori.index', $data);
    }
}
