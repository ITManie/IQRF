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
 * TEST: IQRF\Cloud\Response\DataAPI
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataAPI,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$response = [['17'], ['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],];
$data = new DataAPI($response);

Assert::same($data, $data->getID(8));
Assert::exception(function() {
	$response = [['17'], ['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],];
	$data = new DataAPI($response);
	Assert::same($data, $data->getID(100));
}, 'OutOfRangeException', 'Non exist ID');
