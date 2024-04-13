<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $users = DB::table('users')->paginate(3);
        return view('home.index', ['users'=> $users]);
    }

    public function detail($user_id): View
    {

        $user = DB::table('users')->where('id', $user_id)->first();
        return view('home.detail', ['user'=> $user]);
    }
    public function edit($user_id): View
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        return view('home.edit', ['user'=>$user]);
    }
    public function edited(Request $request, $user_id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
        ]);

        $user = User::all()->where('id', $user_id)->first();
        if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
//        $user->setPasswordAttribute($request->password);
        if ($request->password) {
            $user->update(['password'=>$request->password]);
        }
        $user->save();

        return redirect('/')->with('success', "Account updated.");
    }
    public function delete($user_id): RedirectResponse
    {
        $user = User::all()->where('id', $user_id)->first();
        $user->delete();
        return redirect('/')->with('success', "Account deleted.");
    }
}
