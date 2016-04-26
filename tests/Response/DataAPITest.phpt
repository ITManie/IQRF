<?php

/**
 * TEST: IQRF\Cloud\Response\DataAPI
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Response\DataAPI;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

class DataAPITest extends \Tester\TestCase {

	/**
	 * @var array Data
	 */
	protected $response = [['17'],
		['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],
		['9', '000200000000FFFF0000', '2016-03-30 20:40:25', 'sent', '2016-03-30 20:41:11'],
		['10', '000200000000FFFF0000', '2016-03-30 20:41:34', 'expired'],
		['11', '000200000000FFFF0000', '2016-03-30 20:42:25', 'not­picked'],];

	/**
	 * @test
	 */
	public function testGetData() {
		$data = new DataAPI($this->response);
		Assert::same($this->response, $data->getData());
	}

	/**
	 * @test
	 */
	public function testGetCount() {
		$data = new DataAPI($this->response);
		Assert::same('17', $data->getCount());
	}

	/**
	 * @test
	 */
	public function testGetFirstID() {
		$data = new DataAPI($this->response);
		Assert::same('8', $data->getFirstID());
	}

	/**
	 * @test
	 */
	public function testGetLastedID() {
		$data = new DataAPI($this->response);
		Assert::same('11', $data->getLastedID());
	}

	/**
	 * @test
	 */
	public function testGetID() {
		$response = $this->response;
		$data = new DataAPI($response);
		Assert::same($data, $data->getID(8));
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			$data->getID(100);
		}, OutOfRangeException::class, 'Non exist ID');
	}

	/**
	 * @test
	 */
	public function testGetValue() {
		$response = $this->response;
		$data = new DataAPI($response);
		Assert::same('000200000000FFFF0000', $data->getID(8)->getValue());
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			$data->getValue();
		}, InvalidArgumentException::class, 'ID is empty');
	}

	/**
	 * @test
	 */
	public function testGetSendTime() {
		$response = $this->response;
		$data = new DataAPI($response);
		Assert::same('2016-03-30 20:39:34', $data->getID(8)->getSendTime());
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			$data->getSendTime();
		}, InvalidArgumentException::class, 'ID is empty');
	}

	/**
	 * @test
	 */
	public function testGetStatus() {
		$response = $this->response;
		$data = new DataAPI($response);
		Assert::same('confirmed', $data->getID(8)->getStatus());
		Assert::same('sent', $data->getID(9)->getStatus());
		Assert::same('expired', $data->getID(10)->getStatus());
		Assert::same('not­picked', $data->getID(11)->getStatus());
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			$data->getStatus();
		}, InvalidArgumentException::class, 'ID is empty');
	}

	/**
	 * @test
	 */
	public function testGetReceiveTime() {
		$response = $this->response;
		$data = new DataAPI($response);
		Assert::same('2016-03-30 20:39:41', $data->getID(8)->getReceiveTime());
		Assert::same('2016-03-30 20:41:11', $data->getID(9)->getReceiveTime());
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			Assert::same($data, $data->getID(10)->getReceiveTime());
		}, BadFunctionCallException::class, 'Data has not yet been received');
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			Assert::same($data, $data->getID(11)->getReceiveTime());
		}, BadFunctionCallException::class, 'Data has not yet been received');
		Assert::exception(function() use ($response) {
			$data = new DataAPI($response);
			Assert::same($data, $data->getReceiveTime());
		}, InvalidArgumentException::class, 'ID is empty');
	}

}

$test = new DataAPITest();
$test->run();
