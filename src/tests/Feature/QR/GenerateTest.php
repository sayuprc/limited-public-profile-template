<?php

declare(strict_types=1);

namespace Tests\Feature\QR;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GenerateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testShowForm(): void
    {
        $user = User::factory()->create([
            'user_id' => 1,
            'email' => 'example@example.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $this->get(route('qr.generate.form'))
            ->assertStatus(200);
    }
}
