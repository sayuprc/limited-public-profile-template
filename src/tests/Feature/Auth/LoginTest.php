<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testShowForm(): void
    {
        $this->get(route('login.form'))
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testInvalidValues(): void
    {
        $this->post(route('login'))
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'email',
                'password',
            ]);

        $this->post(route('login'), [
            'email' => 'example@example.com',
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'password',
            ]);

        $this->post(route('login'), [
            'password' => 'password',
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'email',
            ]);

        $this->post(route('login'), [
            'email' => 'example@example.com',
            'password' => 'password',
        ])
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'message',
            ]);
    }

    /**
     * @return void
     */
    public function testLogin(): void
    {
        $credentials = [
            'email' => 'example@example.com',
            'password' => 'password',
        ];

        User::factory()->create([
            'user_id' => '1',
            ...$credentials,
        ]);

        $this->post(route('login'), $credentials)
            ->assertStatus(302)
            ->assertSessionHasNoErrors();
    }
}
