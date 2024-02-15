<?php

declare(strict_types=1);

namespace Tests\Feature\QR;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class RenderingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testRendering(): void
    {
        $user = User::factory()->create([
            'user_id' => (string)Str::uuid(),
            'email' => 'example@example.com',
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $this->get(route('qr.show', ['qr_code_id' => 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA']))
            ->assertStatus(200);
    }
}
