<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Group;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;



class LoginTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */



     public function test_user_can_view_a_login_form()
     {
       $this->visit('/groups/new')
            ->see('Login')
            ->dontSee('Rails')
            ->seePageIs('/login');
      }

      public function test_New_Group()
      {
        $this->visit('/groups/new')
             ->see('login');
           //  ->dontSee('Rails');
      }
     public function testLogin()
     {
       $this->visit('/login')
            ->see('E-Mail Address');
          //  ->dontSee('Rails');
     }
//     public function testDatabase()
//     {
         // Make call to application...

//         $this->seeInDatabase('users', [
//             'name' => 'User1',
//             'email' => 'user1@example.com',
//             'password' => '$2y$10$0CqE/tWQz0ngiMvNxSJUJ.E1Tbh/Pzk5tTQUClS5fZFXA8tnBtw22',
//         ]);
//     }

     public function testNewUserRegistration()
     {
         $this->visit('/register')
              ->type('Taylor', 'name')
              ->type('example@example.com', 'email')
              ->type('123456789', 'password')
              ->type('123456789', 'password_confirmation')
              ->press('Register')
              ->seePageIs('/');
     }

      public function testPasswordMissMatch()
      {
          $this->visit('/register')
               ->type('Taylor', 'name')
               ->type('example@example.com', 'email')
               ->type('123456789', 'password')
               ->type('12356789', 'password_confirmation')
               ->press('Register')
               ->see('The password confirmation does not match.');
      }

}
