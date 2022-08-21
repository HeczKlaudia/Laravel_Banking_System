<?php

namespace App\Http\Controllers;

use App\Models\Szamlak;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    public function transfer($id)
    {

        $szamla = Szamlak::where('id', $id)->first();
        return view('transfer', compact('szamla'));
    }

    public function final_process(Request $request, $id)
    {
        /* VALIDÁLÁS */
        $messages = [
            'cimzettKeresztNev.required' => 'Kötelezően kitöltendő mező.',
            'cimzettKeresztNev.string' => 'A címzett keresztneve számot tartalmaz.',
            'cimzettVezetekNev.required' => 'Kötelezően kitöltendő mező.',
            'cimzettVezetekNev.string' => 'A címzett vezetékneve számot tartalmaz.',
            'cimzettSzamla.required' => 'Kérjük adja meg a számlaszámot!',
            'cimzettSzamla.regex' => 'A számlaszám formátuma hibás.',
            'osszeg.required' => 'Kérjük adja meg az összeget!',
            'osszeg.integer' => 'Az összeg mező csak számot tartalmazhat!',
            'text.required' => 'Kötelezően kitöltendő mező.',
        ];

        $request->validate([
            'cimzettKeresztNev' => ['required', 'regex:/^([a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)(\s[a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)*$/'],
            'cimzettVezetekNev' => ['required', 'regex:/^([a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)(\s[a-záéűúőóüöA-ZÁÉŰÚŐÓÜÖ]+)*$/'],
            'cimzettSzamla' => ['required', 'regex:/^[0-9]{3}-[0-9]{5}-[0-9]{4}-[0-9]{4}(-[0-9]{8})?$/'],
            'osszeg' => 'required|integer',
            'text' => 'required',
        ], $messages);

        $user = Auth::user();

        $szamla_ell = $request->input('cimzettSzamla');
        $keresztnev = $request->input('cimzettKeresztNev');
        $vezeteknev = $request->input('cimzettVezetekNev');
        $text = $request->input('text');

        $sender = Szamlak::where('id', $id)->first();

        /* FOGADÓ FÉL SZÁMLASZÁM ELLENŐRZÉS */
        $receiver = Szamlak::where('szamlaszam', $szamla_ell)->first();

        $invoice = $receiver->szamlaszam;

        $info = Szamlak::where('szamlaszam', $invoice)->first();

        /* ÖSSZEG */

        $transfer_amount = $request->osszeg;
        $sender_previous = $sender->egyenleg;
        $sender_remaining = $sender_previous - $transfer_amount;

        if ($transfer_amount > $sender_previous || $transfer_amount <= 0) {
            return redirect()->back()->with('message', 'Kérjük ellenőrizze a küldeni kívánt összeget!');
        }

        return view('transferCheck', compact('info', 'transfer_amount', 'sender', 'sender_remaining', 'vezeteknev', 'keresztnev', 'text', 'szamla_ell'));
    }

    public function submitted(Request $request, $sender, $receiver, $remaining, $transfer, $text)
    {
        $sender_info = Szamlak::where('id', $sender)->first();
        $receiver_info = Szamlak::where('szamlaszam', $receiver)->first();

        /* ÖSSZEG */
        $receiver_previous_amount = $receiver_info->egyenleg;
        $receiver_new_amount = $receiver_previous_amount + $transfer;
        $receiver_update_amount = Szamlak::where('id', $receiver_info->id)->first();
        $receiver_update_amount->egyenleg = $receiver_new_amount;
        $receiver_update_amount->save();

        $sender_update_amount = Szamlak::find($sender);
        $sender_update_amount->egyenleg = $remaining;
        $sender_update_amount->save();

        /* ÚJ TRANZAKCIÓ */
        $add = new Transfer();

        $add->sender_id = $sender_info->user_id;
        $add->sender_account_id = $sender_info->szamlaszam;

        $sender_data = DB::table('users')
            ->where('id', $sender_info->user_id)
            ->first();

        $add->sender_first_name = $sender_data->first_name;
        $add->sender_last_name = $sender_data->last_name;

        $receiver_data = DB::table('users')
            ->where('id', $receiver_info->user_id)
            ->first();

        $add->receiver_id = $receiver_info->id;
        $add->receiver_first_name = $receiver_data->first_name;
        $add->receiver_last_name = $receiver_data->last_name;
        $add->receiver_account = $receiver_info->szamlaszam;
        $add->amount = $transfer;
        $add->text = $text;

        $add->save();
        return redirect('dashboard');
    }

}
