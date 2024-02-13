@extends('layout')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">
                    <h5>Add PPPTP Client</h5>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Fill in the form below to add a new pptp client</h4>
                    <form action="/pptpclientadd" method="POST" class="row">
                        @csrf


                        <div class="form-group col-md-6">
                            <label for="employeeName">Name </label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="employeeName">Username</label>
                            <input type="text" class="form-control" id="clientusername" name="clientusername"
                                placeholder="Username" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="employeeName">Password</label>
                            <input type="password" class="form-control" id="clientpassword" name="clientpassword"
                                placeholder="Password" required>
                        </div>



                        <div class="form-group col-md-6">
                            <label for="employeeName">IP Address</label>
                            <input type="text" class="form-control" id="ipaddress" name="ipaddress"
                                placeholder="IP Adress" required>
                        </div>



                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Add PPPTP Client</button>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
