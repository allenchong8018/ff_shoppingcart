<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($request, $user){
//return $user;
//        if($user->isStatus()){
//            return redirect('/admin');
////            return 'true';
//        }else{
//            return redirect('/');
////            return 'false';
//        }
        //return auth()->user()->status ? redirect('/'): redirect('/admin');

        if($user->isRole('admin')){
            return redirect('/admin');
        }else{
            return redirect('/');
        }

    }

    public function getLogout(Request $request) {
//        Auth::logout();
//
//        // redirect to homepage
//        return redirect('/');


    }



//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
