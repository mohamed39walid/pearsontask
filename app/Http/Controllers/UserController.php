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
        try {
            User::insert(
                [
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => $request->password,
                    "role" => "user",
                    "created_at" => now()
                ]
            );
            return redirect('http://127.0.0.1:8000/');
        } catch (Exception $e) {
            return response("error in storing data" . $e->getMessage());
        }
    }
}
