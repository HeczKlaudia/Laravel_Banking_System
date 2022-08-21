<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('adminFelhasznalok');
    }

    public function ujFelhasznalo(Request $req)
    {
        $user = new User();

        $user->last_name = $req->input('last_name');
        $user->first_name = $req->input('first_name');
        $user->email = $req->input('email');
        $user->phone_number = $req->input('phone_number');
        $user->username = $req->input('username');
        $user->password = Hash::make($req->input('password'));
        $user->save();

        return redirect('/adminFelhasznalok');
    }
}
