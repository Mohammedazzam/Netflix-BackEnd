@extends('layouts.dashboard.app')

@section('content')

    <h2>Users</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>


    <div class="tile mb-4">

        <div class="row">

            <div class="col-12">

                <form action="">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text"  name="search" autofocus class="form-control" placeholder="search" value="{{request()->search}}">
                            </div>
                        </div><!--end of col-->

                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="role_id" class="form-control">

                                    <option value="">All Roles</option>
                                    @foreach($roles as $role)

                                        <option value="{{ $role->id }}" {{ request()->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div><!--end of col-->

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                            <a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        </div>
                    </div><!--end of row-->

                </form><!--end of form-->

            </div><!--end of col 12-->

        </div><!--end of row-->

        <div class="row">
            <div class="col-md-12">
                @if($users->count()> 0)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $index=>$user)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <h5 style="display: inline-block"><span class="badge badge-primary">{{$role->name}}</span></h5>
                                        @endforeach
                                    <td>
                                        <a href="{{route('dashboard.users.edit',$user->id)}}" class="btn btn-warning  btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                        <form method="post" action="{{route('dashboard.users.destroy',$user->id)}}" style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                        </form><!--end of form-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$users->appends(request()->query())->links()}}

                @else
                    <h3 style="font-weight: 400">Sorry No Data Records Found </h3>

                @endif
            </div>
        </div>
    </div><!--end of tile-->

@endsection