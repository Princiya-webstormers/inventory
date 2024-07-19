<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }
    public function logout(Request $request)
    {
        $authUser = auth()->user()->type;
        if ($authUser == UserType::SUPERADMIN) {
            Auth::logout();
            return redirect('/');
        }elseif ($authUser == UserType::ADMIN) {
            Auth::logout();
            return redirect('/frontend-login');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $url = explode('/', url()->previous());
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if (isset($input['username'])) {
            if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
                if (auth()->user()->type == UserType::SUPERADMIN && $url[3] == 'login') {
                    return redirect('/super-admin/dashboard');
                } else if(auth()->user()->type == UserType::ADMIN && $url[3] == 'frontend-login') {
                    return redirect('/admin/product');
                } else {
                    if($url[3] == 'frontend-login'){
                        Auth::logout();
                        return redirect('/frontend-login')->with('error', 'Please contact admin.');
                    }elseif($url[3] == 'login'){
                        Auth::logout();
                        return redirect('/login')->with('error', 'Sorry something went worng');
                    }
                }
            } else {
                return redirect()->route('login')
                    ->with('error', 'Username And Password Are Wrong.');
            }
        }
    }
}
