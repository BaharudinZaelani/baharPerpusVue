@extends('layouts.template-vue')

@section('title', 'BaharDEV Dashboard')

@section('content')
    @if (isset(Auth::user()->name))
    <navigation title="BaharDEV | API" auth="true"></navigation>
        @else
        <navigation title="BaharDEV | API" auth="false"></navigation>
    @endif
    <div class="content">
        <router-view></router-view>
    </div>
@endsection