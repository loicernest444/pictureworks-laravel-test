<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCrudTest extends TestCase
{
    /**
     * Read user details feature test.
     *
     * @return void
     */
    public function test_user_details_response()
    {
        $user = User::all()->first();

        $response = $this->get('/user/' . $user->id);

        $response->assertStatus(200);
    }
}
