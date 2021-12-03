<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoadingTest extends TestCase
{
  public function testLanding()
  {
      $this->get('/')
           ->see('Laravel 5')
           ->dontSee('Rails');
  }
}
