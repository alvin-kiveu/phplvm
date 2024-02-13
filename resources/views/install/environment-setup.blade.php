@extends('install.layout')
@section('content')
    <div class="card" id="v_1_2">
        <div class="card-header">
            <h5>ENVIRONMENT SETUP</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="/install/edit-env">
                @csrf
                <div class="form-group">
                    <label for="app_name">App Name</label>
                    <input type="text" class="form-control" id="app_name" name="app_name" value="{{ env('APP_NAME') }}"
                        oninput="removeSpaces(this)">
                </div>
                <div class="form-group">
                    <label for="app_url">App URL</label>
                    <input type="text" class="form-control" id="app_url" name="app_url" value="{{ env('APP_URL') }}">
                </div>
                <div class="form-group">
                    <label for="app_env">App Environment</label>
                    <select class="form-control" id="app_env" name="app_env">
                        <option value="local" @if (env('APP_ENV') === 'local') selected @endif>Local</option>
                        <option value="development" @if (env('APP_ENV') === 'development') selected @endif>Development</option>
                        <option value="production" @if (env('APP_ENV') === 'production') selected @endif>Production</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="app_debug">App Debug</label>
                    <select class="form-control" id="app_debug" name="app_debug">
                        <option value="true" @if (env('APP_DEBUG') === 'true') selected @endif>True</option>
                        <option value="false" @if (env('APP_DEBUG') === 'false') selected @endif>False</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="database_connection">Database Connection</label>
                    <select class="form-control" id="database_connection" name="database_connection">
                        <option value="mysql" @if (env('DB_CONNECTION') === 'mysql') selected @endif>MySQL</option>
                        {{-- <option value="pgsql" @if (env('DB_CONNECTION') === 'pgsql') selected @endif>PostgreSQL</option>
                        <!-- Add options for other database connections --> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="database_host">Database Host</label>
                    <input type="text" class="form-control" id="database_host" name="database_host"
                        value="{{ env('DB_HOST') }}">
                </div>
                <div class="form-group">
                    <label for="database_port">Database Port</label>
                    <input type="text" class="form-control" id="database_port" name="database_port"
                        value="{{ env('DB_PORT') }}">
                </div>
                <div class="form-group">
                    <label for="database_name">Database Name</label>
                    <input type="text" class="form-control" id="database_name" name="database_name"
                        value="{{ env('DB_DATABASE') }}">
                </div>
                <div class="form-group">
                    <label for="database_username">Database Username</label>
                    <input type="text" class="form-control" id="database_username" name="database_username"
                        value="{{ env('DB_USERNAME') }}">
                </div>
                <div class="form-group">
                    <label for="database_password">Database Password</label>
                    <input type="password" class="form-control" id="database_password" name="database_password"
                        value="{{ env('DB_PASSWORD') }}">
                </div>
                <!-- Add more fields for other variables in the .env file -->

                <a href="/install/check-requirements" class="btn btn-primary">Back</a>

                <button type="submit" class="btn btn-primary">Save & Next</button>
            </form>
        </div>
    </div>

    <script>
        function removeSpaces(input) {
            input.value = input.value.trim();
        }
    </script>
@endsection
