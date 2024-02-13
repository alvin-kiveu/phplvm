@extends('install.layout')
@section('content')
    <div class="card" id="v_1_2">
        <div class="card-header">
            <img src="/images/banner.png" alt="umeskia" class="img-fluid">
            <h5>PHP LVM - PHP LINUX VPN MANAGER</h5>
            <span>Version 1.0.0 is a quick install.</span>
            <div class>
                <label class="label label-info">V.1.0.0</label>
            </div>
        </div>
        <div class="card-block">
            <p class="content-group">
                <b style="font-weight:600;">PHP LVM<b> is a powerful open-source tool designed to simplify the management of
                        VPNs on Linux systems. Whether you're using OpenVPN, PPTP, L2TP, or other VPN protocols, PHP LVM
                        streamlines the setup and configuration process, making it easier than ever to secure your
                        connections.
            </p>

            <button type="button" class="btn btn-primary" onclick="window.location.href='/install/check-requirements'">Next
                Step</button>
            <p class="content-group">
                <span class="text-muted">Copyright &copy; 2024 PHP LVM [UMESKIA SOFTWARES]. All rights reserved.</span>
            </p>
        </div>
    </div>
@endsection
