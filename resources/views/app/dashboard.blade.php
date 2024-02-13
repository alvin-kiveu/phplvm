@extends('layout')
@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ubuntu Information</h5>
                </div>
                <div class="card-body">
                    <!-- Add your Ubuntu information content here -->
                    <p>Version: {{ php_uname('v') }}</p>
                    <p>Kernel version: {{ php_uname('r') }}</p>
                    <p>Machine type: {{ php_uname('m') }}</p>
                    <p>Operating system: {{ php_uname('s') }}</p>
                    <p>Hostname: {{ php_uname('n') }}</p>
                    <p>Release name: {{ php_uname('release') }}</p>
                    <p>Processor type: {{ php_uname('p') }}</p>
                    <p>Node name: {{ php_uname('n') }}</p>
                    <p>Processor identifier: {{ php_uname('i') }}</p>
                    <p>Architecture: {{ php_uname('m') }}</p>
                    <!-- Add more information as needed -->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>OS Rubin Information</h5>
                </div>
                <div class="card-body">
                    <!-- Add your OS Rubin information content here -->
                    <p>Version: {{ $os_rubin_version }}</p>
                    <p>Kernel version: {{ $os_rubin_kernel }}</p>
                    <p>Machine type: {{ $os_rubin_machine_type }}</p>
                    <p>Operating system: {{ $os_rubin_os }}</p>
                    <p>Hostname: {{ $os_rubin_hostname }}</p>
                    <p>Release name: {{ $os_rubin_release }}</p>
                    <p>Processor type: {{ $os_rubin_processor_type }}</p>
                    <p>Node name: {{ $os_rubin_node_name }}</p>
                    <p>Processor identifier: {{ $os_rubin_processor_id }}</p>
                    <p>Architecture: {{ $os_rubin_architecture }}</p>
                    <!-- Add more information as needed -->
                </div>
            </div>
        </div>

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
                                        <th data-breakpoints="xs sm md">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    use App\Models\Client;
                                    $clients = Client::all();
                                    $counter = 1; // Initialize a counter variable
                                    foreach ($clients as $client) {
                                        echo "<tr>";
                                        echo "<td>" . $counter . "</td>"; // Output the counter
                                        echo "<td>{$client->name}</td>";
                                        echo "<td>{$client->username}</td>";
                                        echo "<td>{$client->password}</td>";
                                        echo "<td>{$client->ipaddress}</td>";
                                        echo "<td>{$client->type}</td>";
                                        echo "</tr>";
                                        $counter++; // Increment the counter
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
