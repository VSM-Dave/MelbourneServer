<?php

namespace Melbourne\Http\Controllers\Auth;

use Melbourne\User;
use Melbourne\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectAfterLogout = route('auth.login');
        $this->redirectTo = route('admin.dashboard');
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

}
