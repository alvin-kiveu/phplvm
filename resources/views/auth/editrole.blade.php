@extends('layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Edit Role</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Fill in the form below to edit a role</h4>
                    <form action="/roleedit" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="eg Admin, Manager" name = "rolename"
                                    value="{{ $role->name }}" required>
                                <input type="hidden" name="roleid" value="{{ $role->ID }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Permisions</label>
                            <div class="col-sm-10">
                                <div class="border-checkbox-section">
                                    @php
                                        $decodedPermissions = json_decode($role->permissions, true);
                                    @endphp
                                    @if (is_array($decodedPermissions))
                                        @foreach ($decodedPermissions as $permission => $value)
                                            @if ($value !== null)
                                                <span class="badge  mr-1">
                                                    @if ($permission == 'employee_management')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox1"
                                                                name="employee_management" checked>
                                                            <label class="border-checkbox-label" for="checkbox1">Employee
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'leave_management')
                                                        <div class="border-checkbox-group">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox2"
                                                                name="leave_management" checked>
                                                            <label class="border-checkbox-label" for="checkbox2">Leave
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'payroll_management')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox3"
                                                                name="payroll_management" checked>
                                                            <label class="border-checkbox-label" for="checkbox3">Payroll
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'attendance_management')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox4"
                                                                name="attendance_management" checked>
                                                            <label class="border-checkbox-label" for="checkbox4">Attendance
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'analytics_reports')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox5"
                                                                name="analytics_reports" checked>
                                                            <label class="border-checkbox-label" for="checkbox5">Analytics &
                                                                Reports</label>
                                                        </div>
                                                    @elseif($permission == 'recruitment')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox6"
                                                                name="recruitment" checked>
                                                            <label class="border-checkbox-label"
                                                                for="checkbox6">Recruitment</label>
                                                        </div>
                                                    @elseif($permission == 'user_management')
                                                        <div class="border-checkbox-group border-checkbox-group-success">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox7"
                                                                name="user_management" checked>
                                                            <label class="border-checkbox-label" for="checkbox7">User
                                                                Management</label>
                                                        </div>
                                                    @endif
                                                </span>
                                            @else
                                                <span class="badge mr-1">
                                                    @if ($permission == 'employee_management')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox1"
                                                                name="employee_management">
                                                            <label class="border-checkbox-label" for="checkbox1">Employee
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'leave_management')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox2"
                                                                name="leave_management">
                                                            <label class="border-checkbox-label" for="checkbox2">Leave
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'payroll_management')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox3"
                                                                name="payroll_management">
                                                            <label class="border-checkbox-label" for="checkbox3">Payroll
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'attendance_management')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox4"
                                                                name="attendance_management">
                                                            <label class="border-checkbox-label" for="checkbox4">Attendance
                                                                Management</label>
                                                        </div>
                                                    @elseif($permission == 'analytics_reports')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox5"
                                                                name="analytics_reports">
                                                            <label class="border-checkbox-label" for="checkbox5">Analytics &
                                                                Reports</label>
                                                        </div>
                                                    @elseif($permission == 'recruitment')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox6"
                                                                name="recruitment">
                                                            <label class="border-checkbox-label"
                                                                for="checkbox6">Recruitment</label>
                                                        </div>
                                                    @elseif($permission == 'user_management')
                                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                                            <input class="border-checkbox" type="checkbox" id="checkbox7"
                                                                name="user_management">
                                                            <label class="border-checkbox-label" for="checkbox7
                                                                ">User
                                                                Management</label>
                                                        </div>
                                                    @endif
                                                </span>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="addrole" class="btn btn-primary m-b-0">ADD ROLE</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
