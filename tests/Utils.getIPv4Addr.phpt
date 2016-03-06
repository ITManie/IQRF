<?php

/**
 * TEST: IQRF\Cloud\Utils
 * @phpVersion >= 5.5
 */

use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();

Assert::same(file_get_contents('http://whatismyip.akamai.com/'), $utils->getIPv4Addr());
Assert::same(file_get_contents('https://api.ipify.org/'), $utils->getIPv4Addr());
