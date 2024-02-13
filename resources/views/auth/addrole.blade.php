@extends('layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Add Role</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Fill in the form below to add a new role</h4>
                    <form action="/roleadd" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="eg Admin, Manager"
                                    name = "rolename" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Permisions</label>
                            <div class="col-sm-10">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-success">
                                        <input class="border-checkbox" type="checkbox" id="checkbox1" name="employee_management">
                                        <label class="border-checkbox-label" for="checkbox1">VPN Management</label>
                                    </div>


                                    <div class="border-checkbox-group border-checkbox-group-success">
                                        <input class="border-checkbox" type="checkbox" id="checkbox7" name="user_management">
                                        <label class="border-checkbox-label" for="checkbox7">User Management</label>
                                    </div>
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
