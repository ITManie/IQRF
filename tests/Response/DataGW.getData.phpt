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

$response = [['76'],
	['67', '2016-03-31 17:43:12', 'DE01FF'], ['68', '2016-03-31 17:43:57', 'DE01FF'],
	['69', '2016-03-31 17:44:03', '0102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F202122232425262728292A2B2C2D2E2F303132333435363738393A3B3C3D3E3F40'],
	['70', '2016-03-31 17:44:08', '0102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F202122232425262728292A2B2C2D2E2F303132333435363738393A3B3C3D3E3F40'],
	['71', '2016-03-31 17:49:04', 'DE01FF'],
	['72', '2016-03-31 17:49:10', '0102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F202122232425262728292A2B2C2D2E2F303132333435363738393A3B3C3D3E3F40'],
	['73', '2016-03-31 17:49:18', 'DE01FF'], ['74', '2016-03-31 17:49:48', 'DE01FF'],
	['75', '2016-03-31 17:56:45', 'DE01FF'], ['76', '2016-03-31 17:58:18', 'DE01FF']];

$data = new DataGW($response);

Assert::same($response, $data->getData());
