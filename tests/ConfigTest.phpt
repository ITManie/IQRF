<?php

/**
 * TEST: IQRF\Cloud\Config
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */

use IQRF\Cloud\Config;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

class ConfigTest extends \Tester\TestCase {

	/**
	 * @test
	 */
	public function testConstructor() {
		$apiUrl = 'https://localhost/api';
		$apiVer = '2';
		$apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';
		$ipAddr = '127.0.0.1';
		$userName = 'admin';
		$config = new Config($apiUrl, $apiVer, $apiKey, $ipAddr, $userName);

		Assert::same($apiUrl, $config->getApiUrl());
		Assert::same($apiVer, $config->getApiVer());
		Assert::same($apiKey, $config->getApiKey());
		Assert::same($ipAddr, $config->getIpAddr());
		Assert::same($userName, $config->getUserName());
	}

}

$test = new ConfigTest();
$test->run();
