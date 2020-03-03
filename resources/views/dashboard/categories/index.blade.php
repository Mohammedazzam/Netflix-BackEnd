@extends('layouts.dashboard.app')

@section('content')

    <h2>Categories</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
            {{--<li class="breadcrumb-item active">Data</li>--}}
        </ol>
    </nav>

@endsection