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

$data = new Data();

$response = '17;;;;;\r\n'
		. '8;000200000000FFFF0000;2016-03-30 20:39:34;confirmed;2016-03-30 20:39:41;\r\n'
		. '9;000000000000;2016-03-31 17:12:58;confirmed;2016-03-31 17:13:04;\r\n'
		. '10;000200000000FFFF0000;2016-03-31 17:16:54;confirmed;2016-03-31 17:16:54;\r\n'
		. '11;000200000000FFFF0000;2016-03-31 17:38:15;confirmed;2016-03-31 17:38:24;\r\n'
		. '12;000000000000;2016-03-31 17:39:19;confirmed;2016-03-31 17:39:24;\r\n'
		. '13;000000000000;2016-03-31 17:49:25;confirmed;2016-03-31 17:49:27;\r\n'
		. '14;000000000000;2016-03-31 19:21:54;confirmed;2016-03-31 19:21:55;\r\n'
		. '15;000000000000;2016-04-04 10:35:40;confirmed;2016-04-04 10:35:49;\r\n'
		. '16;000200000000FFFF0000;2016-04-04 10:36:50;confirmed;2016-04-04 10:36:59;\r\n'
		. '17;000200000000FFFF0000;2016-04-14 20:11:18;confirmed;2016-04-14 20:11:19;';

$array = [['17'],
	['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],
	['9', '000000000000', '2016-03-31 17:12:58', 'confirmed', '2016-03-31 17:13:04'],
	['10', '000200000000FFFF0000', '2016-03-31 17:16:54', 'confirmed', '2016-03-31 17:16:54'],
	['11', '000200000000FFFF0000', '2016-03-31 17:38:15', 'confirmed', '2016-03-31 17:38:24'],
	['12', '000000000000', '2016-03-31 17:39:19', 'confirmed', '2016-03-31 17:39:24'],
	['13', '000000000000', '2016-03-31 17:49:25', 'confirmed', '2016-03-31 17:49:27'],
	['14', '000000000000', '2016-03-31 19:21:54', 'confirmed', '2016-03-31 19:21:55'],
	['15', '000000000000', '2016-04-04 10:35:40', 'confirmed', '2016-04-04 10:35:49'],
	['16', '000200000000FFFF0000', '2016-04-04 10:36:50', 'confirmed', '2016-04-04 10:36:59'],
	['17', '000200000000FFFF0000', '2016-04-14 20:11:18', 'confirmed', '2016-04-14 20:11:19'],];

Assert::same($array, $data->getAPI($response)->getData());
