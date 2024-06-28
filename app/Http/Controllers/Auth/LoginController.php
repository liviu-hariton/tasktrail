<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function redirectTo()
    {
        return $this->redirectTo;
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : $this->setLogoutRedirectTo();
    }

    protected function setLogoutRedirectTo(): RedirectResponse
    {
        return redirect()->route('login')->with('success', 'You have successfully logged out!');
    }
}
