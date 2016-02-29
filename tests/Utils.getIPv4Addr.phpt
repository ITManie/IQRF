<?php

use ITManie\IQRF\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();

Assert::same(file_get_contents('http://whatismyip.akamai.com/'), $utils->getIPv4Addr());
