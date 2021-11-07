@extends('layouts.template-vue')

@section('title', 'Bahar Perpustakaan online cnah')

@section('content')
<div class="wrapper" id="app">
    @if (Auth::user() !== NULL )
        <navigation title="BaharDEV | API" auth="true"></navigation>
        <div class="content">
            {{-- {{ $param }} --}}
            <router-view></router-view>
        </div>
        @else
        <navigation title="BaharDEV | API" auth="false"></navigation>
        <div class="content">
            {{-- {{ $param }} --}}
            <router-view></router-view>
        </div>
    @endif
</div>
@endsection