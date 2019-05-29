<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

	use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_user_can_have_a_project()
    {
    	$user = factory('App\User')->create();

    	$user->project()->create(['title' => 'ProjectX']);

    	$this->assertEquals('ProjectX', $user->project->name);
    }
}
