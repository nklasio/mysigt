<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller {

    public function __invoke(EmailVerificationRequest $request) {
        //throw new \Exception('VerifyEmailController');

        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if (Auth::user()->markEmailAsVerified()) {
            event(new Verified(Auth::user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
