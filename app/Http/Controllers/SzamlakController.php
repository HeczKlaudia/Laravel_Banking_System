<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Szamlak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/* trait Encryptable
{
    public function getEncryptable()
    {
        return $this->encryptable;
    }

    public function getAttribute($key)
    {
        $value = parent::getAttributeValue($key);

        if (in_array($key, $this->encryptable)) {
        //    dd(parent::getAttributeValue($key));
            return $value = Crypt::decrypt($value);
        }
        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}

class ModelDecrypter
{
    public function decryptModel(Model $model)
    {
        foreach ($model->getEncryptable() as $attribute) {
            $model->setAttribute($attribute, decrypt($model->getAttribute($attribute)));
        }

        return $model;
    }

    public function decryptCollection(Collection $collection)
    {
        return $collection->map(function (Model $model) {
         //   dd($model);
            return $this->decryptModel($model);
        });
    }
} */

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
            
    //    $szamlak = (new ModelDecrypter)->decryptCollection($szamlak);

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
