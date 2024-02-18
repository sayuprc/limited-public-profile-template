<?php

declare(strict_types=1);

namespace Tests\Unit\Mock\Actions\QR\Generate;

use App\Mock\Actions\QR\Generate\MockGenerateAction;
use App\UseCases\QR\Generate\GenerateRequest;
use App\UseCases\QR\Generate\GenerateResponse;
use DateTime;
use PHPUnit\Framework\TestCase;

class MockGenerateActionTest extends TestCase
{
    /**
     * @return void
     */
    public function testMock(): void
    {
        $response = (new MockGenerateAction())->handle(new GenerateRequest('', new DateTime()));

        $expected = 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA';

        $this->assertTrue($response instanceof GenerateResponse);
        $this->assertSame($expected, $response->qrCodeId);
    }
}
