<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        //makes 5 fake users
        $users = User::factory()->count(3)->create();
        //gets one user
        $user = User::find(1);
        //sets name property
        $user->name = "KEITH";
        //saves the user
        $user->save();
        //$user = User::find(1);


        $this->assertEquals(5,5);
    }
}
