<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\KategoriPengumuman;

class PengumumanController extends Controller
{
    public function index(){
        $listPengumuman=Pengumuman::all();

        return view('pengumuman.index', compact('listPengumuman'));
    }

    public function show($id){
        //$KategoriArtikel=KategoriArtikel::where('id', $id)->first();
        $Pengumuman=Pengumuman::find($id);

        return view('pengumuman.show', compact('Pengumuman'));
    }

    public function create(){

        $kategoriPengumuman= KategoriPengumuman::pluck('nama','id');

        return view('pengumuman.create', compact('kategoriPengumuman'));
    }

    public function store(Request $request){
        $input=$request->all();

        Artikel::create($input);

        return redirect(route('pengumuman.index'));
    }
}
