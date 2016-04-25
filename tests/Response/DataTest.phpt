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
 * TEST: IQRF\Cloud\Response\Data
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\Data,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

class DataTest extends \Tester\TestCase {

	public function testGetData() {
		$data = new Data();
		$response = '76;;;\r\n' . '70;2016-03-31 17:43:12;DE01FF;\r\n' .
				'71;2016-03-31 17:43:57;DE01FF;\r\n' . '72;2016-03-31 17:49:04;DE01FF;\r\n' .
				'73;2016-03-31 17:49:18;DE01FF;\r\n' . '74;2016-03-31 17:49:48;DE01FF;\r\n' .
				'75;2016-03-31 17:56:45;DE01FF;\r\n' . '76;2016-03-31 17:58:18;DE01FF;';
		$array = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
			['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
			['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
			['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

		Assert::same($array, $data->getData($response));
	}

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

	public function testGetGW() {
		$data = new Data();
		$response = '76;;;\r\n' . '70;2016-03-31 17:43:12;DE01FF;\r\n' .
				'71;2016-03-31 17:43:57;DE01FF;\r\n' . '72;2016-03-31 17:49:04;DE01FF;\r\n' .
				'73;2016-03-31 17:49:18;DE01FF;\r\n' . '74;2016-03-31 17:49:48;DE01FF;\r\n' .
				'75;2016-03-31 17:56:45;DE01FF;\r\n' . '76;2016-03-31 17:58:18;DE01FF;';
		$array = [['76'], ['70', '2016-03-31 17:43:12', 'DE01FF'],
			['71', '2016-03-31 17:43:57', 'DE01FF'], ['72', '2016-03-31 17:49:04', 'DE01FF'],
			['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
			['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

		Assert::same($array, $data->getGW($response)->getData());
	}

}

$test = new DataTest();
$test->run();
