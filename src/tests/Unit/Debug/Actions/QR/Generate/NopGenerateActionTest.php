<?php

declare(strict_types=1);

namespace Tests\Unit\Debug\Actions\QR\Generate;

use App\Debug\Actions\QR\Generate\NopGenerateAction;
use App\UseCases\QR\Generate\GenerateRequest;
use App\UseCases\QR\Generate\GenerateResponse;
use DateTime;
use PHPUnit\Framework\TestCase;

class NopGenerateActionTest extends TestCase
{
    /**
     * @return void
     */
    public function testDebug(): void
    {
        $response = (new NopGenerateAction())->handle(new GenerateRequest('', new DateTime()));

        $expected = 'AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA';

        $this->assertTrue($response instanceof GenerateResponse);
        $this->assertSame($expected, $response->qrCodeId);
    }
}
