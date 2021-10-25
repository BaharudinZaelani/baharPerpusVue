@extends('layouts.app')
@section('title', Auth::user()->role . ' - ' . Auth::user()->name)

@section('content')
{{-- {{ $carbon }} --}}
<div class="container">
    <div class="row">
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Dashboard ' . Auth::user()->role ) }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('book'))
                        <div class="alert alert-warning">
                            {{ session('book') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-3">
            <div class="card">
                <div class="card-header">
                    <div>List Buku</div>
                    <hr>
                    <a href="/buku/tambah" style="text-decoration: none">
                        <svg style="margin-top: -4px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Tambah Buku
                    </a> | 
                    <form action="{{ route('export') }}" method="POST" style="display: inline;">
                        @csrf
                        <button class="btn btn-sm btn-info" type="submit">
                            <svg style="margin-top: -4px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                            </svg>
                            Export Buku List 
                        </button>
                    </form>
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
                                        <a href="/buku/{{ $row->lower }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" style="displat: inline;">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <button type="submit" class="btn btn-sm btn-info mt-3">Import Books</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">Peminjaman</div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="card mt-3">
                
                
            </div>
        </div>
        {{-- <div class="col-md mt-3">
            <div class="card">
                <div class="card-header">
                    List Admin
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'November', 'Oktober', 'Desember'],
            datasets: [{
                label: 'Buku',
                data: [{{ $january }},{{ $february }},{{ $maret }},{{ $april }},{{ $mei }},{{ $juni }},{{ $juli }},{{ $agustus }},{{ $september }},{{ $november }},{{ $oktober }},{{ $desember }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgb(253, 42, 71, 0.2)',
                    'rgb(156, 128, 0, 0.2)',
                    'rgb(0, 255, 183, 0.2)',
                    'rgb(0, 146, 183, 0.2)',
                    'rgb(0, 255, 183, 0.2)',
                    'rgb(0, 144, 183, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgb(253, 42, 71, 0.2)',
                    'rgb(156, 128, 0, 0.2)',
                    'rgb(0, 255, 183, 0.2)',
                    'rgb(0, 146, 183, 0.2)',
                    'rgb(0, 255, 183, 0.2)',
                    'rgb(0, 144, 183, 0.2)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
@endsection
