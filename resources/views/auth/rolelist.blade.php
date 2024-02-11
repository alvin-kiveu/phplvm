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
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @php
                                        $decodedPermissions = json_decode($role->permissions, true);
                                    @endphp

                                    @if(is_array($decodedPermissions))
                                        @foreach($decodedPermissions as $permission => $value)
                                            @if($value !== null)
                                                <span class="badge badge-success mr-1">
                                                    @if($permission == 'employee_management')
                                                        Employee Management
                                                    @elseif($permission == 'leave_management')
                                                        Leave Management
                                                    @elseif($permission == 'payroll_management')
                                                        Payroll Management
                                                    @elseif($permission == 'attendance_management')
                                                        Attendance Management
                                                    @elseif($permission == 'analytics_reports')
                                                        Analytics & Reports
                                                    @elseif($permission == 'recruitment')
                                                        Recruitment
                                                    @elseif($permission == 'user_management')
                                                        User Management
                                                    @endif
                                                </span>
                                            @endif
                                        @endforeach
                                    @endif
                                </td>


                                <td>
                                    <a href="/role/edit/{{$role->ID}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="/role/delete/{{$role->ID}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
