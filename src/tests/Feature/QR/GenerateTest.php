<?php

declare(strict_types=1);

namespace Tests\Feature\QR;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
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

    /**
     * @return void
     */
    public function testGenerate(): void
    {
        $user = User::factory()->create([
            'user_id' => (string)Str::uuid(),
            'email' => 'example@example.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $this->post(route('qr.generate'), [
            'expired_at_date' => '2024-01-01',
            'expired_at_time' => '10:00',
        ])->assertStatus(302)
            ->assertLocation(route('qr.show', ['qr_code_id' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA']));
    }

    /**
     * @return void
     */
    public function testInvalidValues(): void
    {
        $user = User::factory()->create([
            'user_id' => (string)Str::uuid(),
            'email' => 'example@example.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $this->post(route('qr.generate'))
            ->assertStatus(302)
            ->assertSessionHasErrors([
                'expired_at_date',
                'expired_at_time',
            ]);

        $this->post(route('qr.generate'), [
            'expired_at_date' => '2024-01-01',
        ])->assertStatus(302)
            ->assertSessionHasErrors([
                'expired_at_time',
            ]);

        $this->post(route('qr.generate'), [
            'expired_at_time' => '10:00',
        ])->assertStatus(302)
            ->assertSessionHasErrors([
                'expired_at_date',
            ]);

        $this->post(route('qr.generate'), [
            'expired_at_date' => 'invalid',
            'expired_at_time' => 'format',
        ])->assertStatus(302)
            ->assertSessionHasErrors([
                'expired_at_date',
                'expired_at_time',
            ]);
    }
}
