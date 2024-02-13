@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>PPTP Clients</h5>
            <span>All PPTP Clients</span>
        </div>
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                        @foreach ($clients as $client)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
@endsection
