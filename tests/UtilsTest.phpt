<?php

/**
 * TEST: IQRF\Cloud\Utils
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

class UtilsTest extends \Tester\TestCase {

	/**
	 * @test
	 */
	public function testCreateSignature() {
		$utils = new Utils();
		$hash = 'b22aab1b48223e079124c36ac125ed57';
		$parameter = 'ver=2&uid=admin&gid=0d000001&cmd=uplc&data=616263';
		$apiKey = '12345678901234567890123456789012';
		$ipv4 = '127.0.0.1';
		$time = 1456758380;

		Assert::same($hash, $utils->createSignature($parameter, $apiKey, $ipv4, $time));
	}

}

$test = new UtilsTest();
$test->run();