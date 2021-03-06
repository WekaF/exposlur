<?php

namespace App\Http\Controllers\Front;

use App\Buku;
use App\Transaksi;
use App\Kategori;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();
		
    	$data['bukus'] = Buku::where('stok', '>', 0)->limit(6)->get();

    	return view('front.home.index', $data);
    }

    public function pinjam($id)
    {
    	if (Auth::check()) {
    		$check = Transaksi::where('id_user', Auth::user()->id)->where('tgl_kembali', 'Masih dipinjam')->count();
    		if ($check == 5) {
		    	return redirect()->route('home_daftarbuku');
    		} else {
		    	$buku = Buku::find($id);
		    	$buku->stok = $buku->stok - 1;
		    	$buku->save();

		    	$user = Auth::user()->id;

		    	$pinjam = new Transaksi;
		    	$pinjam->id_user = $user;
		    	$pinjam->id_buku = $buku->id;
		    	$pinjam->tgl_pinjam = date('Y-m-d H:i:s');
		    	$pinjam->tgl_kembali = 'Masih dipinjam';
		    	$pinjam->save();

		    	return redirect()->back();
    		}

    	} else {
    		return redirect('/login');
    	}
    }

    public function transaksi()
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

		$data['transaksis'] = Transaksi::where('id_user', Auth::user()->id)->where('tgl_kembali', 'Masih dipinjam')->with('bukus', 'user')->get();

    	return view('front.transaksi.index', $data);
    }
 
    public function pengembalian(Request $r)
    {
    	$buku = Buku::find($r->id_buku);
    	$buku->stok = $buku->stok + 1;
    	$buku->save();

    	$pinjam = Transaksi::find($r->id);
    	$pinjam->tgl_kembali = date('Y-m-d H:i:s');
    	$pinjam->save();

    	return redirect()->back();
    }

    public function daftarbuku()
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

    	$data['bukus'] = Buku::where('stok', '>', 0)->with('kategori')->paginate(12);

    	return view('front.buku.index', $data);
    }

    public function jenis($jenis_buku)
    {
		// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();
		$kategori = Kategori::where('kategori', $jenis_buku)->firstOrFail();

    	$data['bukus'] = Buku::where('id_kategori', $kategori->id)->paginate(12);

    	return view('front.buku.index', $data);
    }

    public function pencarian(Request $r)
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

		$data['keyword'] = $r->keyword;
		$data['bukus'] = Buku::where('judul', 'LIKE', '%'.$r->keyword.'%')->paginate(12);
    	return view('front.buku.search', $data);
    }

    public function detailbuku($id)
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

		$data['bukus'] = Buku::find($id);

		$data['check'] = Transaksi::where('id_user', Auth::id())->where('id_buku', $id)->where('tgl_kembali', 'Masih dipinjam')->get();

    	return view('front.buku.detail', $data);
    }

    public function setting()
    {
    	// Penting
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

		$data['member'] = User::find(Auth::id());

		return view('front.setting.index', $data);
    }

    public function settingstore(Request $r)
    {
    	$member = User::find(Auth::id());
    	$member->name = $r->name;
    	$member->email = $r->email;

    	if ($r->password != NULL) {
    		$member->password = bcrypt($r->password);
    	}

	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/member');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
	    	$member->image = $nm_file;
    	}

    	$member->save();

    	return redirect()->route('home');
    }
}
