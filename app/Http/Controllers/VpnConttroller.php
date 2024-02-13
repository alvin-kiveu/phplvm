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

    public function installPPTP(Request $request)
    {
        shell_exec("apt-get install -y pptpd");
        $this->configurePPTP();
        return redirect()->back()->with('success', 'PPTP VPN installed successfully');
    }

    public function installL2TP(Request $request)
    {
        // shell_exec("apt-get install -y xl2tpd strongswan");
        // $this->configureL2TP($request);
        // return redirect()->back()->with('success', 'L2TP VPN installed successfully');
        return redirect()->back()->with('error', 'L2TP VPN is not supported yet');
    }

    public function installOpenVPN(Request $request)
    {
        // shell_exec("apt-get install -y openvpn");
        // $this->configureOpenVPN($request);
        // return redirect()->back()->with('success', 'OpenVPN installed successfully');
        return redirect()->back()->with('error', 'OpenVPN is not supported yet');
    }

    public function installSSTP(Request $request)
    {
        // shell_exec("apt-get install -y sstp-client");
        // $this->configureSSTP($request);
        // return redirect()->back()->with('success', 'SSTP VPN installed successfully');
        return redirect()->back()->with('error', 'SSTP VPN is not supported yet');
    }


    private function configurePPTP()
    {
        shell_exec("update-rc.d pptpd defaults");
        shell_exec("echo 'localip 172.1.1.1' >> /etc/pptpd.conf");
        shell_exec("echo 'remoteip 172.1.1.2-254' >> /etc/pptpd.conf");
        shell_exec("echo 'ms-dns 8.8.8.8' >> /etc/ppp/pptpd-options");
        shell_exec("echo 'ms-dns 8.8.4.4' >> /etc/ppp/pptpd-options");
        shell_exec("echo 'net.ipv4.ip_forward=1' >> /etc/sysctl.conf");
        shell_exec("sysctl -p");
        shell_exec("iptables -I INPUT -p tcp --dport 1723 -m state --state NEW -j ACCEPT");
        shell_exec("iptables -I INPUT -p gre -j ACCEPT");
        shell_exec("iptables -t nat -I POSTROUTING -o eth0 -j MASQUERADE");
        shell_exec("iptables -I FORWARD -p tcp --tcp-flags SYN,RST SYN -s 172.1.1.0/24 -j TCPMSS  --clamp-mss-to-pmtu");
    }


    private function configureL2TP(Request $request)
    {
    }


    private function configureOpenVPN(Request $request)
    {
    }

    private function configureSSTP(Request $request)
    {
    }
}
