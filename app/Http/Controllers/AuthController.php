<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Roles;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        //HASH PASSWORD
        //$password = Hash::make($password);
        //CHECK IF USER EXISTS ON DB
        $usernameCheck = DB::table('users')->where('username', $username)->first();
        if ($usernameCheck) {
            //ENCRIPT PASSWORD
            if (Hash::check($password, $usernameCheck->password)) {
                $request->session()->put('username', $username);
                return redirect('/dashboard')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid username or password ');
        }
    }

    public function logoutUser(Request $request)
    {
        $request->session()->forget('username');
        return redirect('/login')->with('success', 'Logout successful');
    }

    public function addRole(Request $request)
    {
        $rolename = strip_tags($request->rolename);
        //GET PERMISSIONS CHECKED
        $employee_management = $request->employee_management;
        $leave_management = $request->leave_management;
        $payroll_management = $request->payroll_management;
        $attendance_management = $request->attendance_management;
        $analytics_reports = $request->analytics_reports;
        $recruitment = $request->recruitment;
        $user_management = $request->user_management;
        //CREATE A JSON ARRAY OF PERMISSIONS
        $permissions = array(
            'employee_management' => $employee_management,
            'leave_management' => $leave_management,
            'payroll_management' => $payroll_management,
            'attendance_management' => $attendance_management,
            'analytics_reports' => $analytics_reports,
            'recruitment' => $recruitment,
            'user_management' => $user_management
        );
        $permissions = json_encode($permissions);
        //ADD ROLE TO DB
        $addRole = DB::table('roles')->insert([
            'name' => $rolename,
            'permissions' => $permissions
        ]);
        if ($addRole) {
            return redirect()->back()->with('success', 'Role added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add role');
        }
    }

    public function showRoles()
    {
        $roles = Roles::all(); // Assuming Role is your model
        return view('auth.rolelist', compact('roles'));
    }

    public function editRole($id)
    {
        $role = Roles::find($id);
        return view('auth.editrole', compact('role'));
    }

    public function deleteRole($id)
    {
        $deleteRole = DB::table('roles')->where('id', $id)->delete();
        if ($deleteRole) {
            return redirect()->back()->with('success', 'Role deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete role');
        }
    }

    public function editUserRole(Request $request)
    {
        $id = $request->roleid;
        $rolename = strip_tags($request->rolename);
        //GET PERMISSIONS CHECKED
        $employee_management = $request->employee_management;
        $leave_management = $request->leave_management;
        $payroll_management = $request->payroll_management;
        $attendance_management = $request->attendance_management;
        $analytics_reports = $request->analytics_reports;
        $recruitment = $request->recruitment;
        $user_management = $request->user_management;
        //CREATE A JSON ARRAY OF PERMISSIONS
        $permissions = array(
            'employee_management' => $employee_management,
            'leave_management' => $leave_management,
            'payroll_management' => $payroll_management,
            'attendance_management' => $attendance_management,
            'analytics_reports' => $analytics_reports,
            'recruitment' => $recruitment,
            'user_management' => $user_management
        );
        $permissions = json_encode($permissions);
        //ADD ROLE TO DB
        $editRole = DB::table('roles')->where('ID', $id)->update([
            'name' => $rolename,
            'permissions' => $permissions
        ]);
        if ($editRole) {
            return redirect()->back()->with('success', 'Role updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update role');
        }
    }

    public function addViewUser()
    {
        $roles = Roles::all();
        return view('auth.adduser', compact('roles'));
    }

    public function showUsers()
    {
        $users = DB::table('users')->get();
        return view('auth.userlist', compact('users'));
    }

    public function editUser($id)
    {
        $user = DB::table('users')->where('ID', $id)->first();
        if (!$user) {
            abort(404);
        }
        $roles = Roles::all();
        return view('auth.edituser', compact('user', 'roles'));
    }

    public function deleteUser($id)
    {
        $deleteUser = DB::table('users')->where('ID', $id)->delete();
        if ($deleteUser) {
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user');
        }
    }

    public function addUser(Request $request)
    {
        $username = strip_tags($request->username);
        $password = strip_tags($request->password);
        $role = strip_tags($request->role);
        //HASH PASSWORD
        $password = Hash::make($password);
        //CHECK IF USER EXISTS ON DB
        $usernameCheck = DB::table('users')->where('username', $username)->first();
        if ($usernameCheck) {
            return redirect()->back()->with('error', 'User already exists');
        } else {
            //ADD USER TO DB
            $addUser = DB::table('users')->insert([
                'username' => $username,
                'password' => $password,
                'role' => $role
            ]);
            if ($addUser) {
                return redirect()->back()->with('success', 'User added successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to add user');
            }
        }
    }


    public function editUserDetails(Request $request)
    {
        $id = $request->userid;
        $username = strip_tags($request->username);
        $password = strip_tags($request->password);
        $role = strip_tags($request->role);
        //CHECK IF PASSWORD HAS BEEN CHANGED
        if ($password != '') {
            //HASH PASSWORD
            $password = Hash::make($password);
            //UPDATE PASSWORD
            $password = DB::table('users')->where('ID', $id)->update([
                'password' => $password,
            ]);
        }

        //ADD USER TO DB
        $editUser = DB::table('users')->where('ID', $id)->update([
            'username' => $username,
            'role' => $role
        ]);

        if ($editUser) {
            return redirect()->back()->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    }
}
