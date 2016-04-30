<?php

/**
 * TEST: IQRF\Cloud\IQRF
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\IQRF;
use IQRF\Cloud\Config;
use GuzzleHttp\Client;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/MockClient.php';

class IQRFTest extends \Tester\TestCase {

	const
			API_URL = 'https://localhost/api',
			API_KEY = '12345678901234567890123456789012',
			IP_ADDR = '127.0.0.1',
			USER = 'admin',
			PARAM = 'ver=2&uid=admin&gid=0d000001&cmd=uplc&data=616263';

	/**
	 * @test
	 */
	public function testConstructor() {
		$config = Mockery::mock(Config::class);
		$httpClient = Mockery::mock(Client::class);
		$iqrf = new IQRF($config, $httpClient);

		Assert::same($config, $iqrf->getConfig());
		Assert::same($httpClient, $iqrf->getHttpClient());
	}

	/**
	 * @test
	 */
	public function testCreateSignature() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = Mockery::mock(Client::class);
		$iqrf = new IQRF($config, $httpClient);
		$hash = 'b22aab1b48223e079124c36ac125ed57';
		$time = 1456758380;

		Assert::same($hash, $iqrf->createSignature(self::PARAM, $time));
	}

	/**
	 * @test
	 */
	public function testCreateRequest() {
		$config = new Config(self::API_URL, self::API_KEY, self::IP_ADDR, self::USER);
		$httpClient = new MockClient();
		$iqrf = new IQRF($config, $httpClient);
		$output = self::API_URL . '?' . self::PARAM . '&signature=' .
				$iqrf->createSignature(self::PARAM, time());

		Assert::same($output, $iqrf->createRequest(self::PARAM));
	}

}

$test = new IQRFTest();
$test->run();
