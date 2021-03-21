<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserExampleTest extends TestCase
{
    /**
     * A basic feature test example.
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
    }
}
