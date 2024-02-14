<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @return void
     */
    public function testShowForm(): void
    {
        $this->get(route('login.form'))
            ->assertStatus(200);
    }
}
