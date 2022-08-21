<?php

namespace App\Http\Controllers;

use App\Models\Szamlak;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function withdraw()
    {
        $szamlak = DB::table('accounts')->get();
        return view('withdraw', compact('szamlak'));
    }

    public function newWithdraw(Request $req)
    {
        /* VALIDÁLÁS */
        $messages = [
            'keresztnev.required' => 'Kötelezően kitöltendő mező.',
            'keresztnev.string' => 'A címzett keresztneve számot tartalmaz.',
            'vezeteknev.required' => 'Kötelezően kitöltendő mező.',
            'vezeteknev.string' => 'A címzett vezetékneve számot tartalmaz.',
            'szamlaszam.required' => 'Kérjük adja meg a számlaszámot!',
            'szamlaszam.regex' => 'A számlaszám formátuma hibás.',
            'osszeg.required' => 'Kérjük adja meg az összeget!',
            'osszeg.integer' => 'Az összeg mező csak számot tartalmazhat!',
        ];

        $req->validate([
            'keresztnev' => ['required', 'regex:/^([a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)(\s[a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)*$/'],
            'vezeteknev' => ['required', 'regex:/^([a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)(\s[a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)*$/'],
            'szamlaszam' => ['required', 'regex:/^[0-9]{3}-[0-9]{5}-[0-9]{4}-[0-9]{4}(-[0-9]{8})?$/'],
            'osszeg' => 'required|integer',
        ], $messages);

        $user = Auth::user();

        $deposit = new Transfer();

        $deposit->sender_id = $user->id;
        $deposit->sender_first_name = $user->first_name;
        $deposit->sender_last_name = $user->last_name;
        $deposit->sender_account_id = "pénz kifizetése számláról";

        $deposit->receiver_first_name = $req->input('keresztnev');
        $deposit->receiver_last_name = $req->input('vezeteknev');
        $szamla_ell = $deposit->receiver_account = $req->input('szamlaszam');


        $receiver = Szamlak::where('szamlaszam', $szamla_ell)->first();
        //     dd($receiver);
        $deposit->receiver_id = $receiver->user_id;

        $amount = $deposit->amount = $req->input('osszeg');


        $receiver_previous_amount = $receiver->egyenleg;
        $receiver_new_amount = $receiver_previous_amount - $amount;
        $receiver_update_amount = Szamlak::where('id', $receiver->id)->first();
        $receiver_update_amount->egyenleg = $receiver_new_amount;
        $receiver_update_amount->save();


        $deposit->text = 'deposit';

        $deposit->save();
        return redirect('/transactions');
    }

    public function transactions()
    {
        $my_transactions = Transfer::latest()->get();

        return view('transactions', compact('my_transactions'));
    }
}
