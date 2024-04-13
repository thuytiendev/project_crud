<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return RedirectResponse
     */
    public function perform(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
