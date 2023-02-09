<?php

namespace Algovation\TokenLogin;

use Illuminate\Http\Request;
use \App\Models\User;

class Authenticate {
    public function __invoke(Request $req) {
        $user = User::where('token', $req->token)->first();
        if(!$user) {
            return redirect()->route('login');
        }
        session()->put('user', $user);
        // dd(session()->all());

        // session(['user' => 1] );
        // auth()->login($user);
        auth()->login($user, true);
        // dd(\Auth::user());
        // $user->update(['token' => null]);
        return redirect('/' );
    }
}