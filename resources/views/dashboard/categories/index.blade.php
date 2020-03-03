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


    <div class="tile mb-4">

        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="search">
                            </div>
                        </div><!--end of col-->

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        </div>
                    </div><!--end of row-->
                </form>

            </div>

        </div>
    </div>

@endsection