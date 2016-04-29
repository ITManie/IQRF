<?php

/**
 * TEST: IQRF\Cloud\Response\DataGW
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Response\DataGW;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

class DataGWTest extends \Tester\TestCase {

	/**
	 * @var array Data
	 */
	protected $response = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
		['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
		['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
		['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

	/**
	 * @test
	 */
	public function testGetData() {
		$data = new DataGW($this->response);

		Assert::same($this->response, $data->getData());
	}

	/**
	 * @test
	 */
	public function testGetCount() {
		$data = new DataGW($this->response);

		Assert::same('76', $data->getCount());
	}

	/**
	 * @test
	 */
	public function testGetFirstID() {
		$data = new DataGW($this->response);

		Assert::same('70', $data->getFirstID());
	}

	/**
	 * @test
	 */
	public function testGetLastedID() {
		$data = new DataGW($this->response);

		Assert::same('76', $data->getLastedID());
	}

	/**
	 * @test
	 */
	public function testGetID() {
		$response = $this->response;
		$data = new DataGW($response);

		Assert::same($data, $data->getID(76));
		Assert::exception(function() use ($response) {
			$data = new DataGW($response);
			$data->getID(100);
		}, OutOfRangeException::class, 'Non exist ID');
	}

	/**
	 * @test
	 */
	public function testGetValue() {
		$response = $this->response;
		$data = new DataGW($response);

		Assert::same('DE01FF', $data->getID(70)->getValue());
		Assert::exception(function() use ($response) {
			$data = new DataGW($response);
			$data->getValue();
		}, InvalidArgumentException::class, 'ID is empty');
	}

	/**
	 * @test
	 */
	public function testGetTime() {
		$response = $this->response;
		$data = new DataGW($response);

		Assert::same('2016-03-31 17:43:12', $data->getID(70)->getTime());
		Assert::exception(function() use ($response) {
			$data = new DataGW($response);
			$data->getTime();
		}, InvalidArgumentException::class, 'ID is empty');
	}

}

$test = new DataGWTest();
$test->run();
