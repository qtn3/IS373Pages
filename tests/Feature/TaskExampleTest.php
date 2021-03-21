<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskExampleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_taskCreate()
    {
        //Creating 1 Task and one user to associate with that task.
        $task = Task::factory()->create();
        $task->description = "Hello IS373";
        $task->save();
        //$user = $task->user;
        $user = User::find(1);
        $user->name = "Keith Williams";
        $user->save();
        $tasks= $user->tasks;
        //$task = $tasks;
        dd($task);

    }
}
