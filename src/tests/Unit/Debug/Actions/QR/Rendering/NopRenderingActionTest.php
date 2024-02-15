<?php

declare(strict_types=1);

namespace Tests\Unit\Debug\Actions\QR\Rendering;

use App\Debug\Actions\QR\Rendering\NopRenderingAction;
use App\UseCases\QR\Rendering\RenderingRequest;
use App\UseCases\QR\Rendering\RenderingResponse;
use PHPUnit\Framework\TestCase;

class NopRenderingActionTest extends TestCase
{
    /**
     * @return void
     */
    public function testHandler(): void
    {
        $response = (new NopRenderingAction())->handle(new RenderingRequest('', ''));

        $this->assertTrue($response instanceof RenderingResponse);
        $this->assertSame('data', $response->data);
        $this->assertSame('2024-01-01 10:00', $response->expiredAt->format('Y-m-d H:i'));
    }
}
