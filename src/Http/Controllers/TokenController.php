<?php

namespace Tcoders\TokenLogin\Http\Controllers;

use Tcoders\TokenLogin\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller {

    public function authenticate(Request $req) {

        $user = User::where(config('cross_domain.model_field'), $req[config('cross_domain.url_token_field')])->first();
        if(!$user) {
            return redirect()->route('login');
        }
        $user->update([config('cross_domain.model_field') => null]);
        Auth::login($user);
        return redirect('/' );
    }

    public function enabled() {
        return response()->json(['success' => 'success'], 200);
    }
}