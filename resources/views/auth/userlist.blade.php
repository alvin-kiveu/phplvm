@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Role List</h5>
            <div class="card-block">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UserName</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        @if ($user->role == 'admin')
                                            Not Allowed
                                        @else
                                            <a href="/user/edit/{{ $user->ID }}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <a href="/user/delete/{{ $user->ID }}" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                        @endif
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
