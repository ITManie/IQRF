<?php

/**
 * TEST: IQRF\Cloud\Request\Gateway
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Config;
use IQRF\Cloud\IQRF;
use IQRF\Cloud\Request\Gateway;
use Nette\Utils\AssertionException;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/../MockClient.php';

class GatewayTest extends \Tester\TestCase {

	const
			API_URL = 'https://localhost/api',
			API_KEY = '12345678901234567890123456789012',
			IP_ADDR = '127.0.0.1',
			USER = 'admin',
			GW_ID = '1200FFFF';

	/**
	 * @test
	 * Test function to add GW
	 */
	public function testAdd() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$gw = new Gateway();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&gpw=pass&cmd=add';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());
		Assert::same($output, $gw->add(self::GW_ID, 'pass'));
		Assert::exception(function() {
			(new Gateway())->add(null, 'pass');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new Gateway())->add('1200FFFF', null);
		}, AssertionException::class, 'The gwPW expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to remove GW
	 */
	public function testRemove() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$gw = new Gateway();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=rem';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());
		Assert::same($output, $gw->remove(self::GW_ID));
		Assert::exception(function() {
			(new Gateway())->remove(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to edit GW
	 */
	public function testEdit() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$gw = new Gateway();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=edit&alias=Alias';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());
		Assert::same($output, $gw->edit(self::GW_ID, 'Alias'));
		Assert::exception(function() {
			(new Gateway())->edit(null, 'alias');
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
		Assert::exception(function() {
			(new Gateway())->edit('1200FFFF', null);
		}, AssertionException::class, 'The gwAlias expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to get list of GW
	 */
	public function testGetList() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$gw = new Gateway();
		$param = 'ver=2&uid=admin&cmd=list';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());
		Assert::same($output, $gw->getList());
	}

	/**
	 * @test
	 * Test function to get info about GW
	 */
	public function testGetInfo() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$gw = new Gateway();
		$param = 'ver=2&uid=admin&gid=' . self::GW_ID . '&cmd=info';
		$output = self::API_URL . '?' . $param . '&signature=' . $iqrf->createSignature($param, time());
		Assert::same($output, $gw->getInfo(self::GW_ID));
		Assert::exception(function() {
			(new Gateway())->getInfo(null);
		}, AssertionException::class, 'The gwID expects to be string, NULL given.');
	}

}

$test = new GatewayTest();
$test->run();
