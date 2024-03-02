<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function insert(Request $request)
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
}
