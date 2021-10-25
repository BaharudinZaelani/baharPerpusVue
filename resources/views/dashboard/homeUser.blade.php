@extends('layouts.app')
@section('title', Auth::user()->role . ' - ' . Auth::user()->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('book'))
                        <div class="alert alert-success" role="alert">
                            {{ session('book') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    API TOKEN
                </div>
                <div class="card-body">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $token }}</textarea>
                        <label for="floatingTextarea2">TOKEN</label>
                    </div>
                </div>
                <div class="card-footer">
                    URL : <span class="text-danger">http://127.0.0.1:8000/api/book</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
               <div class="card-header">
                   <div>List Buku</div>
               </div>
               <div class="body">
                   <table class="table table-hover">
                       <thead>
                           <tr>
                               <th>ID_BUKU</th>
                               <th>Penulis</th>
                               <th>Judul Buku</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($buku as $row)
                               <tr>
                                   <td>{{ $row->id }}</td>
                                   <td>{{ $row->penulis }}</td>
                                   <td>{{ $row->judul_buku }}</td>
                                   <td>
                                       <a href="/buku/pinjam/{{ $row->id }}" class="btn btn-sm btn-outline-info">Pinjam Bukunya ?</a>
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    list buku pinjam
                </div>
                <div class="pinjam mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID Pinjam</th>
                                <th>Judul Buku</th>
                                <th>Expired</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjam as $row)
                            @php
                                $lower = preg_replace('/\s+/', '_', $row->judul_buku);
                                $lower = strtolower($lower);
                            @endphp
                                <tr>
                                    <td>{{ $row->id_pinjaman }}</td>
                                    <td>{{ $row->judul_buku }}</td>
                                    <td>{{ substr($row->expired, 0, 10) }}</td>
                                    <td>
                                        <a href="/buku/{{ $lower }}" class="btn btn-sm btn-info">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
       </div>

    </div>
</div>
@endsection
