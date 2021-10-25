@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">WELCOME</div>
            <div class="card-body">
                @guest
                <a href="/login" class="btn btn-sm btn-primary">Login</a>    
                <a href="/register" class="btn btn-sm btn-primary">Register</a> 
                @else
                    <a href="/dashboard" class="btn btn-sm btn-primary">DASHBOARD</a>
                @endguest
                <hr>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi maxime itaque eligendi tenetur porro? Laudantium, quibusdam ullam delectus, impedit voluptatum atque repudiandae nemo, cum quos illo possimus dolorum? Hic, dolore?
            </div>
        </div>
    </div>
</div>
@endsection