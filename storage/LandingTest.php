<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoadingTest extends TestCase
{
  public function testLanding()
  {
		$response = $this->call('GET', '/groups');

		$this->assertEquals(200, $response->getStatusCode());
	}
}
