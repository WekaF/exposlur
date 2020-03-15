<?php

namespace App\Http\Controllers\Admin;

use App\Buku;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $r)
    {
		$search = $r->input('search');
		if ($search) {
			$data['search'] = $search;
			$data['bukus'] = Buku::where('judul', 'like', '%'.$search.'%')->with('kategori')->paginate();
			return view('admin.buku.index', $data);
		}
		
		$data['search'] = '';
    	$data['bukus'] = Buku::with('kategori')->paginate(20);

    	return view('admin.buku.index', $data);
    }

    public function create()
    {
		$data['kategoris'] = Kategori::orderBy('kategori')->get();

    	return view('admin.buku.create', $data);
    }

    public function store(Request $request)
    {

//  dd($request->all());

		$this->validate($request, [
			'isbn' => 'required',
			'judul' => 'required',
			'id_kategori' => 'required',
			'pengarang' => 'required',
			'penerbit' => 'required',
			'tahun' => 'required',
			'stok' => 'required',
			'image' => 'image',
		]);

		//Upload File
		
		// dd($request->all());
        if($request->file('image')) {
            $file = $request->file('image');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('image')->move("uploaded/buku", $fileName);
            $gambar = $fileName;
        } else {
            $gambar = NULL;
        }

		// $buku = Buku::create($input);
		Buku::Create( [
			'judul' 		=> $request->get('judul'),
			'isbn'   	 	=> $request->get('isbn'),
            'id_kategori'   => $request->get('id_kategori'),
            'penerbit'      => $request->get('penerbit'),
            'pengarang'     => $request->get('pengarang'),
			'tahun' 		=> $request->get('tahun'),
			'stok'			=> $request->get('stok'),
            'image'      	=> $gambar
        ]);


		return redirect()->route('/buku');
    }

    public function edit($id)
    {
		$data['kategoris'] = Kategori::orderBy('kategori')->get();
    	$data['bukus'] = Buku::find($id);

    	return view('admin.buku.edit', $data);
    }

    public function update(Request $r, $id)
    {
		$this->validate($r, [
			'isbn' => 'required',
			'judul' => 'required',
			'id_kategori' => 'required',
			'pengarang' => 'required',
			'penerbit' => 'required',
			'tahun' => 'required',
			'stok' => 'required',
			'image' => 'image',
		]);

		$input = $r->input();

    	$buku = Buku::find($id);

	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/buku');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
	    	$input['image'] = $nm_file;
    	}

    	$buku->update($input);

    	return redirect()->route('buku');
    }

    public function delete(Request $r)
    {
    	Buku::where('id', $r->id)->delete();

    	return redirect()->route('buku');
    }
}
