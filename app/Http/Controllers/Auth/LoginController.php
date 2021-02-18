<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';  //DODANO

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




    public function login_with_recaptcha(Request $request){

        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);

         //RECAPTCHA PRTOECTION! 
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Leo88MZAAAAAG9baA_n6NmkoA_hjyPOVnKmfvGx';
    $recaptcha_response = $request->recaptcha_response;

  //dd($recaptcha_response);
    
    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);
   
 


       //  dd($recaptcha);
    if ($recaptcha->score >= 0.4) {
        $user = $request->except(['_token' , 'recaptcha_response' ]);
        Auth::attempt($user);
        return redirect('/');
    }else {
        return dd('Vaše računalo je prepoznato kao potencijalno opasno za ovu stranicu, molim probajte se prijaviti s drugim uređajem!');
    }
}


}
