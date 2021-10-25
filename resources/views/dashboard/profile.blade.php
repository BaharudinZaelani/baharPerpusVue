@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>
                <style>
                    .showList{
                        display: block !important;
                    }
                    .form-edit-nama{
                        display: none;
                    }
                </style>
                <div class="card-body">
                    @if ( session('profile') )
                        <div class="alert alert-success" role="alert">
                            {{ session('profile') }}
                        </div>
                    @endif
                    hallo : <span style="text-transform: capitalize">{{ Auth::user()->name }}</span>
                    <hr>
                    <div class="tools">
                        Tools : <br>
                        <div id="editNama" class="btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Edit Nama</div>
                        <div class="form-edit-nama card mt-2" id="form">
                            <div class="card-header">
                                Edit Nama
                            </div>
                            <div class="card-body">
                                <form action="/edit/name" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input name="name" style="border-radius: 0" type="text" class="form-control" id="floatingInput" placeholder="Masukan Nama Baru">
                                        <label for="floatingInput">Masukan Nama Baru </label>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                        <script>
                            var button = document.getElementById('editNama');
                            var form = document.getElementById('form');
                            // console.log(form);
                            button.addEventListener('click', function(){
                                form.classList.toggle('showList');
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection