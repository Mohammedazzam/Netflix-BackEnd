@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Settings</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.settings.index') }}">Settings</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.settings.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    {{--facebook client id--}}
                    <div class="form-group">
                        <label>Facebook client id</label>
                        <input type="text" name="facebook_client_id" class="form-control" value="{{setting('facebook_client_id')}}">
                    </div>


                    {{--facebook client secret--}}
                    <div class="form-group">
                        <label>Facebook client id</label>
                        <input type="text" name="facebook_client_secret" class="form-control" value="{{setting('facebook_client_secret')}}">
                    </div>



                    {{--facebook redirect url--}}
                    <div class="form-group">
                        <label>Facebook redirect url</label>
                        <input type="text" name="facebook_redirect_url" class="form-control" value="{{setting('redirect_redirect_url')}}">
                    </div>




                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection