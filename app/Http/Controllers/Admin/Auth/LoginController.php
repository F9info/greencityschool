<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laracasts\Flash\Flash;
use App\Models\Admin;
use Hash;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if ($admin != null && $admin->publish == 1) {
            if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->route('admin.dashboard');
            }
        } elseif ($admin != null && $admin->publish == 0) {
            Flash::error('Your account has been disabled, please contact us on projects@f9tech.com for more details.');
            return redirect()->back();
        }
        Flash::error('Invalid Email or Password');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
