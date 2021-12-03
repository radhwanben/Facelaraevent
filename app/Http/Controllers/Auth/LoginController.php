<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
    protected $redirectTo = '/groups';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    



        /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user(); 

//      in this line we will check if the user is already exsit if yes we just login and don't create new user

        $finduser = User::where('provider_id', $user->getId())->first();

        if($finduser){
        //dd($finduser->token);
            Auth::login($finduser);
       }


        if(!$finduser){

           // dd($user);

            $user = User::create([

                'email' =>$user->getEmail(), //getName ."@facebook.com" this is a small solution becease facebook don't return email
                'name' => $user->getName(),
                'provider_id' =>$user->getId(),
                'token'   => $user->token,
                'provider' => $service,               
            ]);
            
            Auth::login($user,true);
        }

        //login the user
        

        //redirect the user 

        return redirect($this->redirectTo);

        // $user->token;
    }
}
