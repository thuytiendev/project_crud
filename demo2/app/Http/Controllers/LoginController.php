<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function show(): View
    {
        return view('auth.login');
    }
    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request): RedirectResponse
    {
//        $credentials = $request->getCredentials();
//
//        if(!Auth::validate($credentials)):
//            return redirect()->to('login')
//                ->withErrors(trans('auth.failed'));
//        endif;
//
//        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        $user = User::find(1);
        Auth::login($user);
        
        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended();
    }
}
