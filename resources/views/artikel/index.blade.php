@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Artikel</div>

                <div class="card-body">
                    <a href="{!! route('artikel.create') !!}" class="btn btn-primary">Tambah Data</a>
                <table Border="1">
            <tr>
                <td>ID</td>
                <td>Judul</td>
                <td>Isi</td>
                <td>Users Id</td>
                <td>Create</td>
                <td>Update</td>
                <td>Kategori Artikel Id</td>
                <td>Aksi</td>
            </tr>

            @foreach($listArtikel as $item)
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->judul !!}</td>
                <td>{!! $item->isi !!}</td>
                <td>{!! $item->users_id !!}</td>
                <td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
                <td>{!! $item->updated_at->format('d/m/Y H:i:s') !!}</td>
                <td>{!! $item->kategori_artikel_id !!}</td>
                <td>
                    <a href="{!! route('artikel.show',[$item->id]) !!}" class="btn btn-sm btn-success">Lihat</a>
                    <a href="{!! route('artikel.edit',[$item->id]) !!}" class="btn btn-sm btn-warning">Ubah</a>

                    {!! Form::open(['route' => ['artikel.destroy', $item->id],'method'=>'delete']) !!}
                        {!! Form::submit('Hapus!',['class'=>'btn btn-sm btn-danger','onclick'=>"return confirm('Apakah anda yakin?')"]); !!}
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach

        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 