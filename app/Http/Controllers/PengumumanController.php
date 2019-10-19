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
        $pengumuman=Pengumuman::find($id);

        return view('pengumuman.show', compact('pengumuman'));
    }

    public function create(){

        $kategoriPengumuman= KategoriPengumuman::pluck('nama','id');

        return view('pengumuman.create', compact('kategoriPengumuman'));
    }

    public function store(Request $request){
        $input=$request->all();

        Pengumuman::create($input);

        return redirect(route('pengumuman.index'));
    }

    public function edit($id){
        $Pengumuman=Pengumuman::find($id);

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        }
        $kategoriPengumuman= KategoriPengumuman::pluck('nama','id');

        return view('pengumuman.edit', compact('kategoriPengumuman','Pengumuman'));
    }

    public function update($id,Request $request) {
        $Pengumuman=Pengumuman::find($id);
        $input=$request->all();

        if(empty($Pengumuman)){
            return redirect(route('Pengumuman.index'));
    }

    $Pengumuman->update($input);

    return redirect(route('pengumuman.index'));
    }

    public function destroy($id) {
        $Pengumuman=Pengumuman::find($id);

        if(empty($Pengumuman)){
            return redirect(route('pengumuman.index'));
        }

        $Pengumuman->delete();
        return redirect(route('pengumuman.index'));
    }

    public function trash(){
        $listPengumuman=Pengumuman::onlyTrashed();

        return view('pengumuman.trash', compact('listPengumuman'));
    }
}
