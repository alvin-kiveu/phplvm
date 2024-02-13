<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class InstallController extends Controller
{
    public function checkRequirements()
    {
        // Check PHP version requirement
        $phpVersionRequired = '8.1.0';
        $phpVersionCurrent = phpversion();
        $phpSupported = version_compare($phpVersionCurrent, $phpVersionRequired) >= 0;
        // Check if MySQLi extension is installed
        $mysqliInstalled = extension_loaded('mysqli');
        // Check if MongoDB extension is installed
        $mongodbInstalled = extension_loaded('mongodb');
        // Check if PDO extension is installed
        $pdoInstalled = extension_loaded('pdo');
        // Check if pdo_mysql extension is installed
        $pdoMysqlInstalled = extension_loaded('pdo_mysql');
        // Check if fopen is enabled
        $fopenEnabled = function_exists('fopen');
        // Check if CURL is enabled
        $curlInstalled = function_exists('curl_version');
        // Check zip extension
        $zipInstalled = extension_loaded('zip');
        //chck if read and write permission is enabled
        $fileReadWriteEnabled = [
            'read' => is_readable(__FILE__),
            'write' => is_writable(__FILE__)
        ];
        // Pass data to the view
        return view('install.check-requirements', [
            'php' => [
                'current' => $phpVersionCurrent,
                'required' => $phpVersionRequired,
                'supported' => $phpSupported,
            ],
            'mysqliInstalled' => $mysqliInstalled,
            'mongodbInstalled' => $mongodbInstalled,
            'pdoInstalled' => $pdoInstalled,
            'pdoMysqlInstalled' => $pdoMysqlInstalled,
            'fopenEnabled' => $fopenEnabled,
            'curlInstalled' => $curlInstalled,
            'zipInstalled' => $zipInstalled,
            'fileReadWriteEnabled' => $fileReadWriteEnabled,
        ]);
    }

    public function environmentSetup()
    {
        return view('install.environment-setup');
    }

    public function createAdminUser()
    {
        // Check if the admin user already exists
        if (!DB::table('users')->where('username', 'admin')->exists()) {
            // Create the admin user
            DB::table('users')->insert([
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]);
        }
    }


    public function changeEnvData(Request $request)
    {
        // Retrieve form data
        $app_name = $request->app_name;
        $app_url = $request->app_url;
        $app_env = $request->app_env;
        $app_debug = $request->app_debug;
        $database_connection = $request->database_connection;
        $database_host = $request->database_host;
        $database_port = $request->database_port;
        $database_name = $request->database_name;
        $database_username = $request->database_username;
        $database_password = $request->database_password;

        // Attempt to connect to the database
        $conn = null;
        $db_connection_failed = false;

        // Try connecting to the database
        if ($database_password === null) {
            $conn = new \PDO("mysql:host={$database_host};port={$database_port}", $database_username);
        } else {
            $conn = new \PDO("mysql:host={$database_host};port={$database_port}", $database_username, $database_password);
        }

        // Check if database connection failed
        if ($conn === null) {
            $db_connection_failed = true;
        }

        // Create the database if connection is successful
        if (!$db_connection_failed) {
            try {

                // Edit .env file
                $envFilePath = base_path('.env');
                $envContent = file_get_contents($envFilePath);

                $envContent = preg_replace('/APP_NAME=.*/', "APP_NAME={$app_name}", $envContent);
                $envContent = preg_replace('/APP_URL=.*/', "APP_URL={$app_url}", $envContent);
                $envContent = preg_replace('/APP_ENV=.*/', "APP_ENV={$app_env}", $envContent);
                $envContent = preg_replace('/APP_DEBUG=.*/', "APP_DEBUG={$app_debug}", $envContent);
                $envContent = preg_replace('/DB_CONNECTION=.*/', "DB_CONNECTION={$database_connection}", $envContent);
                $envContent = preg_replace('/DB_HOST=.*/', "DB_HOST={$database_host}", $envContent);
                $envContent = preg_replace('/DB_PORT=.*/', "DB_PORT={$database_port}", $envContent);
                $envContent = preg_replace('/DB_DATABASE=.*/', "DB_DATABASE={$database_name}", $envContent);
                $envContent = preg_replace('/DB_USERNAME=.*/', "DB_USERNAME={$database_username}", $envContent);
                if ($database_password !== null) {
                    $envContent = preg_replace('/DB_PASSWORD=.*/', "DB_PASSWORD={$database_password}", $envContent);
                }
                file_put_contents($envFilePath, $envContent);
                // DB::connection()->getPdo()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                // try {
                //     DB::statement("CREATE DATABASE IF NOT EXISTS `$database_name`");
                //     return true;
                // } catch (\Exception $e) {
                //     return false;
                // }
                //CREATE A ADMIN USER DB
                $sqlFilePath = public_path('db/phplvm.sql');
                $sql = File::get($sqlFilePath);
                DB::unprepared($sql);
                //ADD AN ADMIN USER ON SYSTERM
                $this->createAdminUser();
                return redirect('/install/finish')->with('success', 'Environment setup completed successfully');
            } catch (\PDOException $e) {
                // Database connection failed
                return redirect()->back()->with('error', 'Database connection failed or database does not exist');
            }
        } else {
            // Database connection failed
            return redirect()->back()->with('error', 'Database connection failed or database does not exist');
        }
    }

    public function finishInstall()
    {
        return view('install.finish-install');
    }
}
