@extends('layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Edit User</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Upadte user details</h4>
                    <form action="/useredit" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">User Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $user->username; ?>"
                                    placeholder="ed jones" name="username" required>
                            </div>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $user->ID; ?>">

                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Role </label>
                            <div class="col-sm-10">
                                <select name="role" class="form-control" required>
                                    <option value="<?php echo $user->role; ?>">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->ID }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="adduser" class="btn btn-primary m-b-0">Add User</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
