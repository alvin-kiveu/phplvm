@extends('layout')
@section('content')
    <div class="row">

        <div class="col-xl-12 col-md-12">

            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>VPN Clients</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                <li><i class="feather icon-maximize full-card"></i></li>
                                <li><i class="feather icon-minus minimize-card"></i></li>
                                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                <li><i class="feather icon-trash close-card"></i></li>
                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0 table-borderless">
                                <thead>
                                    <tr>
                                        <th>N0</th>
                                        <th data-breakpoints="xs">Name</th>
                                        <th data-breakpoints="xs">Username</th>
                                        <th data-breakpoints="xs">Password</th>
                                        <th data-breakpoints="xs">IP Address</th>
                                        <th data-breakpoints="xs sm md">Type<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    use App\Models\Client;
                                    $clients = Client::all();
                                    foreach ($clients as $client) {
                                        echo "<tr>";
                                        echo "<td>{{ $loop->iteration }}</td>";
                                        echo "<td>{$client->name}</td>";
                                        echo "<td>{$client->username}</td>";
                                        echo "<td>{$client->password}</td>";
                                        echo "<td>{$client->ip_address}</td>";
                                        echo "<td>{$client->type}</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
