<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Szamlak;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SzamlakController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;

        $szamlak = DB::table('accounts')
            ->select('accounts.*')
            ->leftJoin('users', 'users.id', '=', 'accounts.user_id')
            ->where('users.id', $user_id)
            ->get();

        return view('dashboard', compact('szamlak'));
    }

    public function proba()
    {
        $user_id = Auth::user()->id;

        DB::statement("SET SQL_MODE=''");

        $szamlak = DB::table('accounts')
            ->select('accounts.nev', 'accounts.szamlaszam', 'accounts.egyenleg', 'accounts.hitelkeret', 'accounts.tipus'/* , DB::raw('max(accounts.updated_at)') */)
            ->leftJoin('users', 'users.id', '=', 'accounts.user_id')
            ->where('users.id', $user_id)
            ->where('accounts.updated_at', DB::raw("(select max(`updated_at`) from accounts)"))
            ->get();

        return view('dashboard', compact('szamlak'));
    }
}
