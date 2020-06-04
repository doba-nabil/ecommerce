<?php

namespace App\Http\Controllers;

use App\Moderator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BackendAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginFrom()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

    protected function authenticated(Request $request, $user)
    {
//        $user->generateToken();
//        response()->json(['data' => $user->toArray()], 201);
        $moderator = Moderator::find($user->id);
        $moderator->last_visit = Carbon::now()->toDateTimeString();
        $moderator->save();
        return Redirect::intended('/admin/home');
    }

    public function __construct()
    {
        $this->middleware('guest:moderator')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('moderator');
    }
}
