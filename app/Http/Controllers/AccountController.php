<?php

namespace App\Http\Controllers;

use App\Models\Szamlak;
use App\Models\Bankok;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $bankok = DB::table('banks')->get();

        $user_id = Auth::user()->id;

        $szamlak = DB::table('accounts')
            ->select('accounts.*')
            ->leftJoin('users', 'users.id', '=', 'accounts.user_id')
            ->where('users.id', $user_id)
            ->get();

        return view('/myAccount', compact('szamlak', 'bankok'));
    }

    public function ujSzamla(Request $req)
    {
        $user = Auth::user();
        $bank = DB::table('banks');
        $szamla = new Szamlak();

        $szamla->nev = $req->input('szamlanev');
        $szamla->szamlaszam = $req->input('szamlaszam');
        $szamla->iban = $req->input('iban');
        $szamla->bank_id = $req->input('bank_id');

        $dt = Carbon::now();
        $user_date = $user->birth_date;

        $datetime1 = new DateTime($dt);
        $datetime2 = new DateTime($user_date);
        $interval = $datetime1->diff($datetime2);
        $current_age = $interval->format('%y');

        if ($current_age < 25) {
            $szamla->tipus = 'Junior számla';
        } else {
            $szamla->tipus = 'Lakossági folyószámla';
        }

        $szamla->user_id = $user->id;
        $szamla->egyenleg = '0';
        $szamla->hitelkeret = '0';

        $szamla->save();
        return redirect('/myAccount');
    }
}
