<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        $listArtikel=Artikel::all();

        return view('artikel.index', compact('listArtikel'));
    }

    public function show($id){
        //$KategoriArtikel=KategoriArtikel::where('id', $id)->first();
        $Artikel=Artikel::find($id);

        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }

        return view('artikel.show', compact('Artikel'));
    }

    public function create(){

        $kategoriArtikel= KategoriArtikel::pluck('nama','id');

        return view('artikel.create', compact('kategoriArtikel'));
    }

    public function store(Request $request){
        $input=$request->all();

        Artikel::create($input);

        return redirect(route('artikel.index'));
    }
    
    public function edit($id){
        $Artikel=Artikel::find($id);

        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }
        $kategoriArtikel= KategoriArtikel::pluck('nama','id');

        return view('artikel.edit', compact('kategoriArtikel','Artikel'));
    }

    public function update($id,Request $request) {
        $Artikel=Artikel::find($id);
        $input=$request->all();

        if(empty($Artikel)){
            return redirect(route('artikel.index'));
    }

    $Artikel->update($input);

    return redirect(route('artikel.index'));
    }

    public function destroy($id) {
        $Artikel=Artikel::find($id);

        if(empty($Artikel)){
            return redirect(route('artikel.index'));
        }

        $Artikel->delete();
        return redirect(route('artikel.index'));
    }
}
