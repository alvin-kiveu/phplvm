@extends('layout')
@section('content')
<div class="row">
    <!-- PPTP VPN Card -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                PPTP VPN
            </div>
            <div class="card-body text-center">
                <img src="/images/pptp.png" alt="PPTP VPN" class="img-fluid mb-3 vpn-image">
                @if($pptpInstalled)
                    <p>Status: Installed <i class="feather icon-check-circle text-success"></i></p>
                @else
                    <p>Status: Not Installed <i class="feather icon-x-circle text-danger"></i></p>
                    <form action="/install-pptp" method="post">
                        @csrf
                        <button class="btn btn-primary">Install</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- L2TP VPN Card -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                L2TP VPN
            </div>
            <div class="card-body text-center">
                <img src="/images/l2tp.png" alt="L2TP VPN" class="img-fluid mb-3 vpn-image">
                @if($l2tpInstalled)
                    <p>Status: Installed <i class="feather icon-check-circle text-success"></i></p>
                @else
                    <p>Status: Not Installed <i class="feather icon-x-circle text-danger"></i></p>
                    <form action="/install-l2tp" method="post">
                        @csrf
                        <button class="btn btn-primary">Install</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- OpenVPN Card -->

    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                OpenVPN
            </div>
            <div class="card-body text-center">
                <img src="/images/openvpn.png" alt="OpenVPN" class="img-fluid mb-3 vpn-image">
                @if($openvpnInstalled)
                    <p>Status: Installed <i class="feather icon-check-circle text-success"></i></p>
                @else
                    <p>Status: Not Installed <i class="feather icon-x-circle text-danger"></i></p>
                    <form action="/install-openvpn" method="post">
                        @csrf
                        <button class="btn btn-primary">Install</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- SSTP VPN Card -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                SSTP VPN
            </div>
            <div class="card-body text-center">
                <img src="/images/sstp.png" alt="SSTP VPN" class="img-fluid mb-3 vpn-image">
                @if($sstpInstalled)
                    <p>Status: Installed <i class="feather icon-check-circle text-success"></i></p>
                @else
                    <p>Status: Not Installed <i class="feather icon-x-circle text-danger"></i></p>
                    <form action="/install-sstp" method="post">
                        @csrf
                        <button class="btn btn-primary">Install</button>
                    </form>

                @endif
            </div>
        </div>
    </div>
</div>



<style>
    .vpn-image {
        height: 100px; /* Adjust the height as needed */
        width: auto; /* Automatically adjust width to maintain aspect ratio */
    }
</style>
@endsection
