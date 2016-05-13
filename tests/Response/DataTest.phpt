<?php

/**
 * TEST: IQRF\Cloud\Response\Data
 * @phpVersion >= 5.5
 * @testCase
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use IQRF\Cloud\Response\Data;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

class DataTest extends \Tester\TestCase {

	/**
	 * @test
	 * Test function to get data
	 */
	public function testGetData() {
		$data = new Data();
		$response = '76;;;\r\n70;2016-03-31 17:43:12;DE01FF;\r\n' .
				'71;2016-03-31 17:43:57;DE01FF;\r\n72;2016-03-31 17:49:04;DE01FF;\r\n' .
				'73;2016-03-31 17:49:18;DE01FF;\r\n74;2016-03-31 17:49:48;DE01FF;\r\n' .
				'75;2016-03-31 17:56:45;DE01FF;\r\n76;2016-03-31 17:58:18;DE01FF;';
		$array = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
			['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
			['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
			['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

		Assert::same($array, $data->getData($response));
	}

	/**
	 * @test
	 * Test function to get data
	 */
	public function testGetAPI() {
		$data = new Data();
		$response = '17;;;;;\r\n'
				. '8;000200000000FFFF0000;2016-03-30 20:39:34;confirmed;2016-03-30 20:39:41;\r\n'
				. '9;000000000000;2016-03-31 17:12:58;confirmed;2016-03-31 17:13:04;\r\n'
				. '10;000200000000FFFF0000;2016-03-31 17:16:54;confirmed;2016-03-31 17:16:54;\r\n'
				. '11;000200000000FFFF0000;2016-03-31 17:38:15;confirmed;2016-03-31 17:38:24;\r\n'
				. '12;000000000000;2016-03-31 17:39:19;confirmed;2016-03-31 17:39:24;';
		$array = [['17'],
			['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],
			['9', '000000000000', '2016-03-31 17:12:58', 'confirmed', '2016-03-31 17:13:04'],
			['10', '000200000000FFFF0000', '2016-03-31 17:16:54', 'confirmed', '2016-03-31 17:16:54'],
			['11', '000200000000FFFF0000', '2016-03-31 17:38:15', 'confirmed', '2016-03-31 17:38:24'],
			['12', '000000000000', '2016-03-31 17:39:19', 'confirmed', '2016-03-31 17:39:24']];

		Assert::same($array, $data->getAPI($response)->getData());
	}

	/**
	 * @test
	 * Test function to get data
	 */
	public function testGetGW() {
		$data = new Data();
		$response = '76;;;\r\n70;2016-03-31 17:43:12;DE01FF;\r\n' .
				'71;2016-03-31 17:43:57;DE01FF;\r\n72;2016-03-31 17:49:04;DE01FF;\r\n' .
				'73;2016-03-31 17:49:18;DE01FF;\r\n74;2016-03-31 17:49:48;DE01FF;\r\n' .
				'75;2016-03-31 17:56:45;DE01FF;\r\n76;2016-03-31 17:58:18;DE01FF;';
		$array = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
			['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
			['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
			['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

		Assert::same($array, $data->getGW($response)->getData());
	}

}

$test = new DataTest();
$test->run();
