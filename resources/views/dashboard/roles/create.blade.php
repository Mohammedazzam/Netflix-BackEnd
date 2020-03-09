@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Role</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Role</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.roles.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4 style="font-weight:400 ">Permissions</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 15%">Model</th>
                                <th>Permissions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @php

                                $models = ['categories','movies','users','settings'] //هذه خاصة للإضافة في الرولز

                            @endphp


                            @foreach($models as $index=>$model)

                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td class="text-capitalize">{{$model}}</td>
                                    <td>
                                        @php

                                            $permissions_maps=['create','read','update','delete']

                                        @endphp

                                        @if($model == 'settings')

                                            @php
                                                $permissions_maps  =['create','read'];
                                            @endphp

                                        @endif

                                        <select name="permissions[]" class="form-control select2" multiple>


                                            @foreach($permissions_maps as $permissions_map)

                                                <option value="{{$permissions_map. '_' . $model}}">{{$permissions_map}}</option>

                                            @endforeach

                                        </select>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection