<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VpnConttroller extends Controller
{
    public function showVPN()
    {
        $pptpInstalled = $this->isPackageInstalled('pptpd');
        $l2tpInstalled = $this->isPackageInstalled('l2tp');
        $openvpnInstalled = $this->isPackageInstalled('openvpn');
        $sstpInstalled = $this->isPackageInstalled('sstp');
        return view('app.vpn', compact('pptpInstalled', 'l2tpInstalled', 'openvpnInstalled', 'sstpInstalled'));
    }


    private function isPackageInstalled($packageName)
    {
        $output = shell_exec("dpkg -s $packageName 2>&1");
        return strpos($output, "Status: install ok installed") !== false;
    }


}
