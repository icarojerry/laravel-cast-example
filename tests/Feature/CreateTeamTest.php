<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTeamTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_create_a_team()
    {

        //the command above is used while it is being written. 
        //$this->withoutExceptionHandling();

        //[Given] I'm a user who is logged in
        $this->actingAs(factory('App\User')->create()); //create a new user and make the login

        //[When] they hit the endpoint /teams to create a new project, while passing the necessary data.
        $this->post('/projects', [
            'name' => 'Team',
            'description' => 'this is a team'
        ]);

        //[Then] there should be a new in the database. 
        $this->assertDatabaseHas('teams', ['name' => 'Team']);
    }
}
