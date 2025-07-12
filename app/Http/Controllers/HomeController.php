<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showDashboard()
    {
       $users= $this->getUsers();
        return view('dashboard', compact('users'));
    }
public function showHomePage()
{

    $users = User::all();
    $loginUser = auth()->user();
    return view('Userhome', compact('users', 'loginUser'));
}
    public function getUsers()
    {
         $users = User::all(); // Fetch all users
        return $users;
    }
}
