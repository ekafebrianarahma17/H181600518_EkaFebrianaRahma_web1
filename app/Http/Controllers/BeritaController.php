<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;

class BeritaController extends Controller
{
    public function index(){
        $listBerita=Berita::all();

        return view('berita.index', compact('listBerita'));
    }

    public function show($id){
        //$KategoriArtikel=KategoriArtikel::where('id', $id)->first();
        $Berita=Berita::find($id);

        return view('berita.show', compact('Berita'));
    }

    public function create(){

        $kategoriBerita= KategoriBerita::pluck('nama','id');

        return view('berita.create', compact('kategoriBerita'));
    }

    public function store(Request $request){
        $input=$request->all();

        Artikel::create($input);

        return redirect(route('berita.index'));
    }
}
