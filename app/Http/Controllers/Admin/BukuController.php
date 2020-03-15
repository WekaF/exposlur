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
    
    
    public function index(Request $request)
    {
        $search = $request->input('search');
		if ($search) {
			$data['search'] = $search;
			$data['bukus'] = Buku::where('judul', 'like', '%'.$search.'%')->with('kategori')->paginate();
			return view('admin.buku.index', $data);
		}
		
		$data['search'] = '';
        $data['bukus'] = Buku::with('kategori')->paginate(20);
        

    	return view('admin.buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategoris'] = Kategori::orderBy('kategori')->get();

    	return view('admin.buku.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        Buku::Create( [
            'judul' 		=> $request->get('judul'),
			'isbn'   	 	=> $request->get('isbn'),
            'id_kategori'   => $request->input('id_kategori'),
            'penerbit'      => $request->get('penerbit'),
            'pengarang'     => $request->get('pengarang'),
			'tahun' 		=> $request->get('tahun'),
			'stok'			=> $request->get('stok'),
            'image'      	=> $gambar
        ]);

        return redirect()->route('buku.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kategoris'] = Kategori::orderBy('kategori')->get();
    	$data['bukus'] = Buku::find($id);


        return view('admin.buku.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Buku::findOrFail($id);

        Buku::find($id)->update($request->all());
                
       
        return redirect()->route('buku.index',compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        
        return redirect()->route('buku.index');
    }
}
