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
use Nette\Utils\AssertionException;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';

class ConfigTest extends \Tester\TestCase {

	/**
	 * @var string API URL
	 */
	private $apiUrl = 'https://localhost/api';

	/**
	 * @var string API key
	 */
	private $apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';

	/**
	 * @var string Server IPv4 address
	 */
	private $ip = '127.0.0.1';

	/**
	 * @var string User name
	 */
	private $user = 'admin';

	/**
	 * @test
	 * Test constructor of class
	 */
	public function testConstructor() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same($this->apiUrl, $config->getApiUrl());
		Assert::same($this->apiKey, $config->getApiKey());
		Assert::same($this->ip, $config->getIpAddr());
		Assert::same($this->user, $config->getUserName());
	}

	/**
	 * @test
	 * Test function to get API URL
	 */
	public function testGetApiUrl() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same($this->apiUrl, $config->getApiUrl());
		Assert::exception(function() {
			new Config('api', 'apiKey', 'ip', 'user');
		}, AssertionException::class, 'The apiUrl expects to be url, string \'api\' given.');
		Assert::exception(function() {
			new Config(null, 'apiKey', 'ip', 'user');
		}, AssertionException::class, 'The apiUrl expects to be url, NULL given.');
	}

	/**
	 * @test
	 * Test function to get API key
	 */
	public function testGetApiKey() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same($this->apiKey, $config->getApiKey());
		Assert::exception(function() {
			new Config('https://localhost/api', null, 'ip', 'user');
		}, AssertionException::class, 'The apiKey expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to get IPv4 address of server
	 */
	public function testGetIpAddr() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same($this->ip, $config->getIpAddr());
		Assert::exception(function() {
			new Config('https://localhost/api', 'apiKey', null, 'user');
		}, AssertionException::class, 'The ipAddr expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to get user name
	 */
	public function testGetUserName() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same($this->user, $config->getUserName());
		Assert::exception(function() {
			new Config('https://localhost/api', 'apiKey', 'ip', null);
		}, AssertionException::class, 'The userName expects to be string, NULL given.');
	}

	/**
	 * @test
	 * Test function to get API version
	 */
	public function testGetApiVer() {
		$config = new Config($this->apiUrl, $this->apiKey, $this->ip, $this->user);

		Assert::same(2, $config->getApiVer());
	}

}

$test = new ConfigTest();
$test->run();
