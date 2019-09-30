<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index(){
        $ListKategoriArtikel=KategoriArtikel::all();

        return view('kategori_artikel.index', compact('ListKategoriArtikel'));
    }
    public function show($id){
        //$kategoriArtikel=KategoriArtikel::where('id, $id')->first();
        $kategoriArtikel=KategoriArtikel::find($id);

        
    }
}
