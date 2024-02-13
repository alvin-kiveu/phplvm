@extends('install.layout')

@section('content')
    <div class="card" id="v_1_2">
        <div class="card-header">
            <h5>Setup Complete</h5>
        </div>
        <div class="card-body">
            <p>Congratulations! Your environment setup is complete.</p>
            <p>You can now start using your application.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Home Page</a>
        </div>
    </div>
@endsection
