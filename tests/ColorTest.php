<?php

declare(strict_types=1);

namespace Chapter\Tests;

use Chapter\Functions\Color;
use Exception;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    /** @var string */
    private const HEXADECIMAL_STUB = '28AA46';
    /** @var int[] */
    private const RGB_STUB = [40, 170, 70];

    /** @var Color */
    private $color;

    protected function setUp(): void
    {
        parent::setUp();

        $this->color = new Color();
    }

    public function test_convert_rgb_to_hex()
    {
        $result = $this->color->rgbToHex(...self::RGB_STUB);

        $this->assertEquals(self::HEXADECIMAL_STUB, $result);
    }

    public function test_cannot_convert_rgb_to_hex()
    {
        $this->expectException(Exception::class);

        $this->color->rgbToHex(-1, -1, -1);
    }

    public function test_convert_hex_to_rgb()
    {
        $result = $this->color->hexToRGB(self::HEXADECIMAL_STUB);

        $this->assertIsArray($result);
        $this->assertCount(3, $result);
        $this->assertEquals(self::RGB_STUB[0], $result[0]);
        $this->assertEquals(self::RGB_STUB[1], $result[1]);
        $this->assertEquals(self::RGB_STUB[2], $result[2]);
    }

    public function test_cannot_convert_hex_to_rgb()
    {
        $this->expectException(\Exception::class);

        $this->color->hexToRGB('no-hex');
    }
}
