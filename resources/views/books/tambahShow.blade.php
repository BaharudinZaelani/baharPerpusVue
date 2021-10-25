@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tambah </div>
            </div>
            <div class="card-body">
                <form action="/buku/tambah" method="POST">
                    @csrf
                    <table class="table">
                        <tr>
                            <th class="text-right">Judul Buku</th>
                            <td><input name="judul_buku" type="text" style="height: 28px;" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Penulis</th>
                            <td><input name="penulis" type="text" style="height: 28px; width: 150px" class="form-control" readonly value="{{ Auth::user()->name }}"></td>
                        </tr>
                        <tr>
                            <th class="text-right">Penerbit</th>
                            <td><input name="penerbit" type="text" style="height: 28px; width: 150px" class="form-control" value="RuangBuku" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-sm btn-success">Upload</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection