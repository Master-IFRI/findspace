@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account-multiple"></i>
                </span> Manage users
            </h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hoverable Table</h4>
{{--                    <p class="card-description">Description.....--}}
{{--                    </p>--}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td><label class="badge badge-danger">{{strtoupper($user->roles)}}</label></td>
                                <td class="text-center">
                                    <div class="row">
                                        <i class="text-center text-warning mdi-18px mdi mdi-pen"></i>
                                        <i class="text-center text-danger mdi-18px mdi mdi-delete"></i>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
