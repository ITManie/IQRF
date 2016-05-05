<?php

/**
 * TEST: IQRF\Cloud\Validators
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Validators;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

class ValidatorsTest extends \Tester\TestCase {

	/**
	 * @test
	 */
	public function testIsIPv4Addr() {
		Assert::null(Validators::isIPv4Addr('77.75.79.39'));
		Assert::exception(function() {
			Validators::isIPv4Addr('127.0.0.1');
		}, \InvalidArgumentException::class, 'Invalid IPv4 address');
		Assert::exception(function() {
			Validators::isIPv4Addr('2a02:598:2::1053');
		}, \InvalidArgumentException::class, 'Invalid IPv4 address');
		Assert::exception(function() {
			Validators::isIPv4Addr('240.5.75.157');
		}, \InvalidArgumentException::class, 'Invalid IPv4 address');
		Assert::exception(function() {
			Validators::isIPv4Addr('seznam.cz');
		}, \InvalidArgumentException::class, 'Invalid IPv4 address');
	}

	/**
	 * @test
	 */
	public function testIsGwId() {
		Assert::null(Validators::isGwId('1200FFFF'));
		Assert::null(Validators::isGwId('1200ffff'));
		Assert::exception(function() {
			Validators::isGwId('1200');
		}, \InvalidArgumentException::class, 'Invalid GW ID');
		Assert::exception(function() {
			Validators::isGwId('1200gggg');
		}, \InvalidArgumentException::class, 'Invalid GW ID');
		Assert::exception(function() {
			Validators::isGwId('1200GGGG');
		}, \InvalidArgumentException::class, 'Invalid GW ID');
		Assert::exception(function() {
			Validators::isGwId('gwID');
		}, \InvalidArgumentException::class, 'Invalid GW ID');
	}

}

$test = new ValidatorsTest();
$test->run();
