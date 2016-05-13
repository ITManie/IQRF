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
use Nette\Utils\AssertionException;
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
	 * Test function to get last data
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
		Assert::exception(function() {
			(new DataGW())->getLast(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getLast('1200FFFF', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get new data
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
		Assert::exception(function() {
			(new DataGW())->getNew(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getNew('1200FFFF', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data from ID
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
		Assert::exception(function() {
			(new DataGW())->getFrom(null, 1);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFrom('1200FFFF', null);
		}, AssertionException::class, 'The messageID expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFrom('1200FFFF', 1, null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data to ID
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
		Assert::exception(function() {
			(new DataGW())->getTo(null, 1);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getTo('1200FFFF', null);
		}, AssertionException::class, 'The messageID expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getTo('1200FFFF', 1, null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data from ID and to ID
	 */
	public function testGetFromTo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from=1&to=2';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTo(self::GW_ID, 1, 2));
		Assert::exception(function() {
			(new DataGW())->getFromTo(null, 1, 2);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTo('1200FFFF', null, 2);
		}, AssertionException::class, 'The from expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTo('1200FFFF', 1, null);
		}, AssertionException::class, 'The to expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data from time
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
		Assert::exception(function() {
			(new DataGW())->getFromTime(null, '2005-04-01 01:02:03');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTime('1200FFFF', null);
		}, AssertionException::class, 'The fromTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data to time
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
		Assert::exception(function() {
			(new DataGW())->getToTime(null, '2005-04-01 01:02:03');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getToTime('1200FFFF', null);
		}, AssertionException::class, 'The toTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getToTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 * Test function to get data drom time and to time
	 */
	public function testGetFromTimeToTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataGW();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnld&from_time=20050401010203&to_time=20050401211243';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTimeToTime(self::GW_ID, '2005-04-01 01:02:03', '2005-04-01 21:12:43'));
		Assert::exception(function() {
			(new DataGW())->getFromTimeToTime(null, '2005-04-01 01:02:03', '2005-04-01 21:12:43');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTimeToTime('1200FFFF', null, '2005-04-01 21:12:43');
		}, AssertionException::class, 'The fromTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataGW())->getFromTimeToTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The toTime expects to be string, NULL given.');
	}

}

$test = new DataGWTest();
$test->run();
