<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraphController extends Controller
{
    
        private $api;
    /*
        in this construct we inisialte the token to use the graph facebook sdk
        the token is generate on developer.facebook.com
        you can learn more about this here 
        https://developers.facebook.com/docs/facebook-login/access-tokens/
    
    */    
        public function __construct(Facebook $fb)
        {
            $this->middleware(function ($request, $next) use ($fb) {
                $fb->setDefaultAccessToken(Auth::user()->token);
                $this->api = $fb;
                return $next($request);
            });
        }


    /*
        in this function  we retrieve User Profile data use can get more than event with add to the $params 
        learn more here => https://developers.facebook.com/docs/php/howto/example_retrieve_user_profile
        then i do simple  redirect user with his event and show them in view
     
    
    */  
        public function retrieveUserProfile(){
            try {
     
                $params = "events";
     
                $user = $this->api->get('/me?fields='.$params)->getGraphPage()->asArray();

                 return view('events.eventlist')->with('user',$user['events']);

   
            // in this line we just catch any errors    
               
            } catch (FacebookSDKException $e) {
                return view('events.eventlist')->with('e',$e);
            }
     
        }
    
}
