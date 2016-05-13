<?php

/**
 * TEST: IQRF\Cloud\Request\Data
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Config;
use IQRF\Cloud\IQRF;
use IQRF\Cloud\Request\Data;
use Nette\Utils\AssertionException;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/../MockClient.php';

class DataTest extends \Tester\TestCase {

	const
			API_URL = 'https://localhost/api',
			API_KEY = '12345678901234567890123456789012',
			IP_ADDR = '127.0.0.1',
			USER = 'admin',
			GW_ID = '1200FFFF';

	/**
	 * @test
	 * Test function to send data to IQRF Cloud
	 */
	public function testSend() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new Data();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=uplc&data=Log';
		$output = self::API_URL . '?' . $param . '&signature=' .
				$iqrf->createSignature($param, time());
		Assert::same($output, $data->send(self::GW_ID, 'Log'));
		Assert::exception(function() {
			(new Data())->send(null, 'Log');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new Data())->send('1200FFFF', null);
		}, AssertionException::class, 'The data expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to get info about IQRF Cloud
	 */
	public function testGetCloudInfo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new Data();
		$param = 'ver=2&uid=admin&cmd=info';
		$output = self::API_URL . '?' . $param . '&signature=' .
				$iqrf->createSignature($param, time());
		Assert::same($output, $data->getCloudInfo());
	}

}

$test = new DataTest();
$test->run();
