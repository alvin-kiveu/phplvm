@extends('layout')
@section('content')
    <div class="row">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">

                        <div class="card">
                            <div class="card-header">
                                <h5>Filtering</h5>
                                <span>Include filtering in your FooTable.</span>
                            </div>
                            <div class="card-block">
                                <table id="demo-foo-filtering" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th data-breakpoints="xs">Name</th>
                                            <th data-breakpoints="xs">Username</th>
                                            <th data-breakpoints="xs">Password</th>
                                            <th data-breakpoints="xs">IP Adress</th>
                                            <th data-breakpoints="xs sm md">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $client->iteration }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->username }}</td>
                                                <td>{{ $client->password }}</td>
                                                <td>{{ $client->ipaddress }}</td>
                                                <td>
                                                    <a href="/ppptclientedit/{{ $client->id }}" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="/pptpclientdelete/{{ $client->id }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
