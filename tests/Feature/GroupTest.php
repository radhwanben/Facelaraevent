<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Group;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function testGroups()
     {
       $this->artisan('db:seed');
       $this->visit('/groups')
            ->see('Groups')
            ->dontSee('Rails');

     }

//       use RefreshDatabase;
         /** @test */
     public function test_it_can_create_a_group()
       {
         $faker = \Faker\Factory::create();
         $user = \App\User::create([
         'name'        => 'admin',
         'email'  => 'example@example.com',
         'password'  => 'example@example.com',
     ]);
         $this  ->actingAs($user)
                ->visit('/groups/new')
                ->type('Group100', 'group')
                ->press('SAVE')
                ->see('Group100')
                ->type('contact_name2', 'contact_name')
                ->type('address', 'address')
                ->type('post_code', 'post_code')
                ->type('city', 'city')
                ->type('email', 'email')
                ->press('SAVE')
                ->see('Group100')
                ->see('contact_name2')
                ->see('address')
                ->see('post_code')
                ->see('city')
               ->visit('/groups/1')
                ->type('Group2', 'group')
                //->seeInDatabase('group', ['email' => 'email'])
                ->press('SAVE')
                ->see('Group2');
      }
}
