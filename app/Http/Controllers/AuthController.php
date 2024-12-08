<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Редирект на страницу авторизации ВКонтакте
    public function redirectToVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    // Обработка callback от ВКонтакте
    public function handleVKCallback()
    {
        try {
            $vkUser = Socialite::driver('vkontakte')->user();

            Auth::login($vkUser);

            return redirect()->route('profile');
        } catch (\Exception $e) {
            return redirect('/')->withErrors(['auth' => 'Ошибка авторизации.']);
        }
    }

    // Отображение профиля
    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }
}
