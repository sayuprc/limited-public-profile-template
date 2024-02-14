<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testLogout(): void
    {
        $user = User::factory()->create([
            'user_id' => 1,
            'email' => 'example@example.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $this->get(route('logout'))
            ->assertStatus(302)
            ->assertLocation(route('login.form'));
    }
}
