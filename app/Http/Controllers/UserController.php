<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{

    public function index(Request $request)
    {
        try {
            $query = User::with(['department', 'designation']);

            $users = $query->get();
            return view('users', compact('users'));
        } catch (Exception $e) {
            throw $e;
        }
    }
}
