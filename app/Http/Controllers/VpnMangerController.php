<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class VpnMangerController extends Controller
{
    public function addPPTP(Request $request)
    {
        $clientname = $request->name;
        $clientusername = $request->clientusername;
        $clientpassword = $request->clientpassword;
        $ipaddress = $request->ipaddress;
        $chap_secrets_path = "/etc/ppp/chap-secrets";
        $ip_exists = false;
        if (file_exists($chap_secrets_path)) {
            $lines = file($chap_secrets_path, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                if (strpos($line, $ipaddress) !== false) {
                    $ip_exists = true;
                    break;
                }
            }
        }
        if (!$ip_exists) {
            $line = "$clientusername pptpd $clientpassword $ipaddress";
            file_put_contents("/etc/ppp/chap-secrets", $line . PHP_EOL, FILE_APPEND | LOCK_EX);
            exec("service pptpd restart");
            //ADD TO DATABASE
            DB::table('clients')->insert([
                'name' => $clientname,
                'username' => $clientusername,
                'password' => $clientpassword,
                'ipaddress' => $ipaddress,
                'type' => 'PPTP',
            ]);
            return  redirect()->back()->with('success', 'Client added successfully');
        } else {
            return  redirect()->back()->with('error', 'IP Address already exists');
        }
    }

    public function viewPPTP()
    {
        $clients = Client::where('type', 'PPTP')->get();
        return view('app.pptpclientlist', compact('clients'));
    }

}
