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
 * TEST: IQRF\Cloud\Utils
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();
$hash = 'b22aab1b48223e079124c36ac125ed57';
$parameter = 'ver=2&uid=admin&gid=0d000001&cmd=uplc&data=616263';
$apiKey = '12345678901234567890123456789012';
$ipv4 = '127.0.0.1';
$time = 1456758380;

Assert::same($hash, $utils->createSignature($parameter, $apiKey, $ipv4, $time));
