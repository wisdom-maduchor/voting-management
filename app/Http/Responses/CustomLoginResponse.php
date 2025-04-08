<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->intended(route('filament.voting-admin.pages.dashboard'));
            // return redirect()->intended('/voting-admin');
        }

        if ($user->role === 'contestant') {
            return redirect()->intended(route('filament.contestant.pages.dashboard'));
            // return redirect()->intended('/contestant');
        }

        if ($user->role === 'voter') {
            return redirect()->intended(route('filament.voter.pages.dashboard'));
            // return redirect()->intended('/voter');
        }

        // fallback
        // return redirect('/');
        return Redirect::to('/');
    }
}
