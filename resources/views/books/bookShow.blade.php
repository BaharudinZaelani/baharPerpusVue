@extends('layouts.app')

@section('content')
<div class="container mb-4">
    <div class="label">
        <a href="/dashboard">< Kembali</a>
    </div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ $buku->judul_buku }}
                </div>
                <div class="card-body">
                    <div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut inventore fugit excepturi exercitationem nobis in voluptas nostrum explicabo asperiores. Illo nobis consequuntur temporibus numquam eos dolor dolorum ad ratione veniam.
                    </div>
                    <table class="table">
                        <tr>
                            <th>Nama Buku</th>
                            <td>: {{ $buku->judul_buku }}</td>
                        </tr>
                        <tr>
                            <th>ID_BUKU</th>
                            <td>: {{ $buku->id }}</td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>: {{ $buku->penerbit }}</td>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <td>: {{ $buku->penulis }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @if( Auth::user()->role == 'admin' )
                <div class="card">
                    <div class="card-body">
                        <a href="/buku/delete/{{ $buku->id }}" class="btn btn-danger">Hapus Buku</a>
                    </div>
                </div>
                @else 
                <div class="card">
                    <div class="card-body">
                        {{ Auth::user()->name }} meminjam buku ini 
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection