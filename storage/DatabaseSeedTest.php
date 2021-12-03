<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
  public function testDatabase()
  {
      $this->visit('/')
           ->see('Laravel 5')
           ->dontSee('Rails');
  }
}
