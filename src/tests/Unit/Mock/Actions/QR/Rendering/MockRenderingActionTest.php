<?php

declare(strict_types=1);

namespace Tests\Unit\Mock\Actions\QR\Rendering;

use App\Mock\Actions\QR\Rendering\MockRenderingAction;
use App\UseCases\QR\Rendering\RenderingRequest;
use App\UseCases\QR\Rendering\RenderingResponse;
use PHPUnit\Framework\TestCase;

class MockRenderingActionTest extends TestCase
{
    /**
     * @return void
     */
    public function testHandler(): void
    {
        $response = (new MockRenderingAction())->handle(new RenderingRequest('', ''));

        $this->assertTrue($response instanceof RenderingResponse);
        $this->assertSame('data', $response->data);
        $this->assertSame('2024-01-01 10:00', $response->expiredAt->format('Y-m-d H:i'));
    }
}
