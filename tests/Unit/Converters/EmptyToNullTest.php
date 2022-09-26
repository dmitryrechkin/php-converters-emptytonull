<?php

declare(strict_types=1);

namespace DmitryRechkin\Tests\Unit\Converters\EmptyToNull;

use DmitryRechkin\Converters\EmptyToNull\EmptyToNull;
use PHPUnit\Framework\TestCase;
use stdClass;

class EmptyToNullTest extends TestCase
{
	/**
	 * @return void
	 */
	public function testConvertOfNullReturnsNull(): void
	{
		$this->assertNull((new EmptyToNull())->convert(null));
	}

	/**
	 * @return void
	 */
	public function testConvertOfEmptyStringReturnsNull(): void
	{
		$this->assertNull((new EmptyToNull())->convert(''));
	}

	/**
	 * @return void
	 */
	public function testConvertOfStringReturnsItAsIs(): void
	{
		$expectedValue = 'xxxx';
		$this->assertSame($expectedValue, (new EmptyToNull())->convert($expectedValue));
	}

	/**
	 * @return void
	 */
	public function testConvertOfZeroReturnsNull(): void
	{
		$this->assertNull((new EmptyToNull())->convert(0));
	}

	/**
	 * @return void
	 */
	public function testConvertOfNumberReturnsItAsIs(): void
	{
		$expectedValue = 999.9;
		$this->assertSame($expectedValue, (new EmptyToNull())->convert($expectedValue));
	}

	/**
	 * @return void
	 */
	public function testConvertOfEmptyArrayReturnsNull(): void
	{
		$this->assertNull((new EmptyToNull())->convert([]));
	}

	/**
	 * @return void
	 */
	public function testConvertOfArrayReturnsItAsIs(): void
	{
		$expectedValue = [1, 2, 3];
		$this->assertSame($expectedValue, (new EmptyToNull())->convert($expectedValue));
	}

	/**
	 * @return void
	 */
	public function testConvertOfObjectReturnsItAsIs(): void
	{
		$expectedValue = new stdClass();
		$this->assertSame($expectedValue, (new EmptyToNull())->convert($expectedValue));
	}
}
