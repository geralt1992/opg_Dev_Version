<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Ćužpajz_Hr_Pozdrav;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/'; //DODANO

    protected function redirectTo()
    {
        if (auth()->user()->is_owner === 'Vlasnik') {
            return '/user/create_opg';
        }
        return '/';
    } //DODANO
 

     

    
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:55', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'surname' => [ 'max:255' , 'string'],
            'username' => ['required',  'max:15' , 'unique:users' , 'string'],
            'owner' => ['required'],
            'conditions' => ['required'],
            'profile_picture' => ['mimes:jpeg,png,jpg,gif,svg|max:2048'],
            
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */





        protected function create(array $data)
        {


        //RECAPTCHA PRTOECTION! 
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6Leo88MZAAAAAG9baA_n6NmkoA_hjyPOVnKmfvGx';
        $recaptcha_response = request('recaptcha_response');


        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);

        if ($recaptcha->score >= 0.4) {
            
            $request = request();

            Mail::to($request->email)->send(new Ćužpajz_Hr_Pozdrav($request));

        
            if($request->hasFile('profile_picture')){ 
            $filename = time(). '.' .$request->username. '.' .$request->profile_picture->getClientOriginalExtension();
            request()->profile_picture->move(public_path('/avatars/user_avatars') , $filename);
        

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'last_name' => $data['surname'],
                'username' => $data['username'],
                'is_owner' => $data['owner'],
                'avatar' =>  $filename,
                'rules_accepted' => $data['conditions'],
            ]);
        }else{

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'last_name' => $data['surname'],
                'username' => $data['username'],
                'is_owner' => $data['owner'],
                'rules_accepted' => $data['conditions'],

            ]);

        }
        } else {
            return dd('Vaše računalo je prepoznato kao potencijalno opasno za ovu stranicu, molim probajte se prijaviti s drugim uređajem!');
        }

    }



}