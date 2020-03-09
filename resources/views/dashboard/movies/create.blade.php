@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Movies</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index') }}">movie</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <div class="d-flex justify-content-center align-items-center flex-column"
                     style="height: 25vh; border: 1px solid black">

                    <i class="fa fa-video-camera fa-2x"></i>

                    <p>Click To Upload</p>

                </div>

                <form method="post" action="{{ route('dashboard.movies.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection