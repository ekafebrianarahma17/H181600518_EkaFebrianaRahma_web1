<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\KategoriGaleri;

class GaleriController extends Controller
{
    public function index(){
        $listGaleri=Galeri::all();

        return view('galeri.index', compact('listGaleri'));
    }

    public function show($id){
        //$KategoriArtikel=KategoriArtikel::where('id', $id)->first();
        $galeri=Galeri::find($id);

        return view('galeri.show', compact('galeri'));
    }

    public function create(){

        $kategoriGaleri= KategoriGaleri::pluck('nama','id');

        return view('galeri.create', compact('kategoriGaleri'));
    }

    public function store(Request $request){
        $input=$request->all();

        Galeri::create($input);

        return redirect(route('galeri.index'));
    }

    public function edit($id){
        $Galeri=Galeri::find($id);

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
        }
        $kategoriGaleri= KategoriGaleri::pluck('nama','id');

        return view('galeri.edit', compact('kategoriGaleri','Galeri'));
    }

    public function update($id,Request $request) {
        $Galeri=Galeri::find($id);
        $input=$request->all();

        if(empty($Galeri)){
            return redirect(route('galeri.index'));
    }

    $Galeri->update($input);

    return redirect(route('galeri.index'));
    }
}
