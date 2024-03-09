<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:0|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        User::create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "role" => "user",
                "created_at" => now()
            ]
        );
        return redirect('http://127.0.0.1:8000/');
    }
    public function showaddingform()
    {
        return view('superadmindashboard.adduserform');
    }
    public function addingusers(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ],[
            'name.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        User::create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "role" => $request->role,
                "created_at" => now()
            ]
        );
        return redirect('/userdashboard');
    }
    public function getusers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();
        return view("superadmindashboard.dashboard")->with('users', $users);
    }
    public function showupdateform($id)
    {
        $user = User::find($id);
        return view('superadmindashboard.updateuser')->with('id', $id)->with('user', $user);
    }
    public function updateuserdata(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'name.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        $user_update = User::findorFail($id);
        $user_update->update([
            "name" => $request->name,
            "role" => $request->role,
        ]);
        return redirect('/userdashboard');
    }
    public function confirmdelete($id){
        return view('superadmindashboard.confirmdeleteuser')->with('id',$id);
    }
    public function deleteuser($id){
        User::findorFail($id)->delete();
        return redirect('/userdashboard');
    }

}
