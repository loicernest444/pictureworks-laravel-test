<?php

namespace Tests\Feature\Console\Commands;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateUserCommentsTest extends TestCase
{
    /**
     * Test update:comments command of exist user.
     *
     * @return void
     */
    public function test_update_exist_user_comments()
    {
        $user = User::orderBy('id', 'desc')->first();

        $this->artisan('update:comments', ['id: The ID of the user' => $user->id, 'comments: The new user comment' => "comment test command"])
                        ->assertExitCode(0);
    }

    /**
     * Test update:comments command of not exist user.
     *
     * @return void
     */
    public function test_update_not_exist_user_comments()
    {
        $user = User::orderBy('id', 'desc')->first();

        $this->artisan('update:comments', ['id: The ID of the user' => $user->id + 1, 'comments: The new user comment' => "Test command"])
                        ->assertExitCode(1);
    }
}
