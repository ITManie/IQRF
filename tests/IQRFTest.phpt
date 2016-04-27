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

class IQRFTest extends \Tester\TestCase {

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

	public function testCreateSignature() {
		$apiUrl = 'https://localhost/api';
		$apiKey = '12345678901234567890123456789012';
		$config = new Config($apiUrl, '2', $apiKey, '127.0.0.1', 'admin');
		$httpClient = Mockery::mock(Client::class);
		$iqrf = new IQRF($config, $httpClient);
		$hash = 'b22aab1b48223e079124c36ac125ed57';
		$param = 'ver=2&uid=admin&gid=0d000001&cmd=uplc&data=616263';
		$time = 1456758380;

		Assert::same($hash, $iqrf->createSignature($param, $time));
	}

}

$test = new IQRFTest();
$test->run();
