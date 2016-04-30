<?php

/**
 * TEST: IQRF\Cloud\Request\DataGW
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Config;
use IQRF\Cloud\IQRF;
use IQRF\Cloud\Request\DataGW;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/../MockClient.php';

class DataGWTest extends \Tester\TestCase {

	const
			API_URL = 'https://localhost/api',
			API_KEY = '12345678901234567890123456789012',
			IP_ADDR = '127.0.0.1',
			USER = 'admin',
			GW_ID = '1200FFFF';

	/**
	 * @test
	 */
	public function testGetLast() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&last=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getLast(self::GW_ID));
		Assert::same($output, $data->getLast(self::GW_ID, 1));
	}

	/**
	 * @test
	 */
	public function testGetNew() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&new=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getNew(self::GW_ID));
		Assert::same($output, $data->getNew(self::GW_ID, 1));
	}

	/**
	 * @test
	 */
	public function testGetFrom() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFrom(self::GW_ID, 1));
		Assert::same($output, $data->getFrom(self::GW_ID, 1, 1));
	}

	/**
	 * @test
	 */
	public function testGetTo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&to=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getTo(self::GW_ID, 1));
		Assert::same($output, $data->getTo(self::GW_ID, 1, 1));
	}

	/**
	 * @test
	 */
	public function testGetFromTo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from=1&to=2';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTo(self::GW_ID, 1, 2));
	}

	/**
	 * @test
	 */
	public function testGetFromTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from_time=20050401010203&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTime(self::GW_ID, '2005-04-01 01:02:03'));
		Assert::same($output, $data->getFromTime(self::GW_ID, '2005-04-01 01:02:03', 1));
	}

	/**
	 * @test
	 */
	public function testGetToTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&to_time=20050401010203&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getToTime(self::GW_ID, '2005-04-01 01:02:03'));
		Assert::same($output, $data->getToTime(self::GW_ID, '2005-04-01 01:02:03', 1));
	}

	/**
	 * @test
	 */
	public function testGetFromTimeToTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from_time=20050401010203&to_time=20050401211243';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTimeToTime(self::GW_ID, '2005-04-01 01:02:03', '2005-04-01 21:12:43'));
	}

}

$test = new DataGWTest();
$test->run();
