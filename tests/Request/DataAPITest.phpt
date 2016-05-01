<?php

/**
 * TEST: IQRF\Cloud\Request\DataAPI
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Config;
use IQRF\Cloud\IQRF;
use IQRF\Cloud\Request\DataAPI;
use Nette\Utils\AssertionException;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/../MockClient.php';

class DataAPITest extends \Tester\TestCase {

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
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&last=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getLast(self::GW_ID));
		Assert::same($output, $data->getLast(self::GW_ID, 1));
		Assert::exception(function() {
			(new DataAPI())->getLast(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getLast('1200FFFF', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetNew() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&new=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getNew(self::GW_ID));
		Assert::same($output, $data->getNew(self::GW_ID, 1));
		Assert::exception(function() {
			(new DataAPI())->getNew(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getNew('1200FFFF', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetFrom() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&from=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFrom(self::GW_ID, 1));
		Assert::same($output, $data->getFrom(self::GW_ID, 1, 1));
		Assert::exception(function() {
			(new DataAPI())->getFrom(null, 1);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFrom('1200FFFF', null);
		}, AssertionException::class, 'The messageID expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFrom('1200FFFF', 1, null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetTo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&to=1&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getTo(self::GW_ID, 1));
		Assert::same($output, $data->getTo(self::GW_ID, 1, 1));
		Assert::exception(function() {
			(new DataAPI())->getTo(null, 1);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getTo('1200FFFF', null);
		}, AssertionException::class, 'The messageID expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getTo('1200FFFF', 1, null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetFromTo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&from=1&to=2';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTo(self::GW_ID, 1, 2));
		Assert::exception(function() {
			(new DataAPI())->getFromTo(null, 1, 2);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTo('1200FFFF', null, 2);
		}, AssertionException::class, 'The from expects to be int, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTo('1200FFFF', 1, null);
		}, AssertionException::class, 'The to expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetFromTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&from_time=20050401010203&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTime(self::GW_ID, '2005-04-01 01:02:03'));
		Assert::same($output, $data->getFromTime(self::GW_ID, '2005-04-01 01:02:03', 1));
		Assert::exception(function() {
			(new DataAPI())->getFromTime(null, '2005-04-01 01:02:03');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTime('1200FFFF', null);
		}, AssertionException::class, 'The fromTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetToTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&to_time=20050401010203&count=1';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getToTime(self::GW_ID, '2005-04-01 01:02:03'));
		Assert::same($output, $data->getToTime(self::GW_ID, '2005-04-01 01:02:03', 1));
		Assert::exception(function() {
			(new DataAPI())->getToTime(null, '2005-04-01 01:02:03');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getToTime('1200FFFF', null);
		}, AssertionException::class, 'The toTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getToTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The count expects to be int, NULL given.');
	}

	/**
	 * @test
	 */
	public function testGetFromTimeToTime() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$data = new DataAPI();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=dnlc&from_time=20050401010203&to_time=20050401211243';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());

		Assert::same($output, $data->getFromTimeToTime(self::GW_ID, '2005-04-01 01:02:03', '2005-04-01 21:12:43'));
		Assert::exception(function() {
			(new DataAPI())->getFromTimeToTime(null, '2005-04-01 01:02:03', '2005-04-01 21:12:43');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTimeToTime('1200FFFF', null, '2005-04-01 21:12:43');
		}, AssertionException::class, 'The fromTime expects to be string, NULL given.');
		Assert::exception(function() {
			(new DataAPI())->getFromTimeToTime('1200FFFF', '2005-04-01 01:02:03', null);
		}, AssertionException::class, 'The toTime expects to be string, NULL given.');
	}

}

$test = new DataAPITest();
$test->run();
