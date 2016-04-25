<?php

/**
 * TEST: IQRF\Cloud\IQRF
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\IQRF,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

class IQRFTest extends \Tester\TestCase {

	/**
	 * @test
	 */
	public function testConstructor() {
		$apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';
		$ipAddr = '127.0.0.1';
		$userName = 'admin';
		$iqrf = new IQRF($apiKey, $ipAddr, $userName);

		Assert::same($apiKey, $iqrf->getApiKey());
		Assert::same($ipAddr, $iqrf->getIpAddr());
		Assert::same($userName, $iqrf->getUserName());
	}

}

$test = new IQRFTest();
$test->run();
