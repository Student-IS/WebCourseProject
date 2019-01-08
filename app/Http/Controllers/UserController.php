<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function showAdmin(User $user)
    {
        return view('admin.profile', ['user' => $user]);
    }

    public function show(User $user)
    {
        return view('user.profile', ['user' => $user]);
    }
}
