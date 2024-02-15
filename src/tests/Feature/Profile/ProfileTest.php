<?php

declare(strict_types=1);

namespace Tests\Feature\Profile;

use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * @return void
     */
    public function testShowProfile(): void
    {
        $this->get(route('profile'))
            ->assertStatus(200);
    }
}
