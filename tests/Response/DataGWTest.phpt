<?php

/**
 * Copyright (C) 2016  Roman Ondráček
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * TEST: IQRF\Cloud\Response\DataGW
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataGW,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

class DataGWTest extends \Tester\TestCase {

	/**
	 * @var array Data
	 */
	protected $response = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
		['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
		['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
		['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

	public function testGetData() {
		$data = new DataGW($this->response);
		Assert::same($this->response, $data->getData());
	}

	public function testGetCount() {
		$data = new DataGW($this->response);
		Assert::same('76', $data->getCount());
	}

	public function testGetFirstID() {
		$data = new DataGW($this->response);
		Assert::same('70', $data->getFirstID());
	}

	public function testGetLastedID() {
		$data = new DataGW($this->response);
		Assert::same('76', $data->getLastedID());
	}

	public function testGetID() {
		$data = new DataGW($this->response);
		Assert::same($data, $data->getID(76));
		Assert::exception(function() {
			$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
			$data = new DataGW($response);
			Assert::same($data, $data->getID(100));
		}, 'OutOfRangeException', 'Non exist ID');
	}

	public function testGetValue() {
		$data = new DataGW($this->response);
		Assert::same('DE01FF', $data->getID(70)->getValue());
		Assert::exception(function() {
			$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
			$data = new DataGW($response);
			Assert::same($data, $data->getValue());
		}, 'InvalidArgumentException', 'ID is empty');
	}

	public function testGetTime() {
		$data = new DataGW($this->response);
		Assert::same('2016-03-31 17:43:12', $data->getID(70)->getTime());
		Assert::exception(function() {
			$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
			$data = new DataGW($response);
			Assert::same($data, $data->getTime());
		}, 'InvalidArgumentException', 'ID is empty');
	}

}

$test = new DataGWTest();
$test->run();
