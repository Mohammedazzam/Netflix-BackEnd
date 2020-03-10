@extends('layouts.dashboard.app')

@push('styles')

    <style>
        #movie__upload-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25vh;
            flex-direction: column;
            cursor: pointer;
            border: 1px solid black;
        }
    </style>


@endpush


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

                <div id="movie__upload-wrapper"
                     onclick="document.getElementById('movie__file-input').click()"

                >

                    <i class="fa fa-video-camera fa-2x"></i>

                    <p>Click To Upload</p>

                </div>

                <input type="file" name="" id="movie__file-input" style="display: none">

                <form id="movie__properties"
                      method="post"
                      action="{{ route('dashboard.movies.store') }}"
                      style="display: none"
                >
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')


                    {{--name--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                        <input type="text" name="name" id="movie__name" class="form-control">
                    </div>

                    {{--description--}}
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>


                    {{--poster--}}
                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" name="poster"  class="form-control">
                    </div>


                    {{--image--}}
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image"  class="form-control">
                    </div>


                    {{--year--}}
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year"  class="form-control">
                    </div>


                    {{--rating--}}
                    <div class="form-group">
                        <label>Rating</label>
                        <input type="number" min="1" name="rating" class="form-control">
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection