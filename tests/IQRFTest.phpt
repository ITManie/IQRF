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
 * TEST: IQRF\Cloud\IQRF
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\IQRF,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

class IQRFTest extends \Tester\TestCase {

	public function testConstructor() {
		$apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';
		$ipAddr = '127.0.0.1';
		$userName = 'admin';
		$iqrf = new IQRF($apiKey, $ipAddr, $userName);

		Assert::same($apiKey, $iqrf->getApiKey());
		Assert::same($ipAddr, $iqrf->getIpAddr());
		Assert::same($userName, $iqrf->getUserName());
	}

}

$test = new IQRFTest();
$test->run();
