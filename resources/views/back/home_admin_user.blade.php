@extends('layouts.back')

@php use App\User;  @endphp

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="text-value-home">{{count(User::all())}}</div>
                        <p class="text-center text-value-md" style="font-size:2rem;padding-top:5%;">Users</p>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:20px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>All Users</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                {{--<th>Photo</th>--}}
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Update at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $key => $elem)
                                <tr>
                                    {{--<td><img class="img-responsive" src="/upload/user/{{$elem->photo ?? "Undefined"}}" /></td>--}}
                                    <td>{{$elem->name ?? "null"}}</td>
                                    <td>{{$elem->email ?? "null"}}</td>
                                    <td>{{$elem->created_at ?? "null"}}</td>
                                    <td>{{$elem->updated_at ?? "null"}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination">
                            {{$user->links()}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
