<?php

use ITManie\IQRF\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$parameter = 'ver=2&uid=test&gid=0d000001&cmd=uplc&data=616263';
$apiKey = '12345678901234567890123456789012';
$utils = new Utils();

function test($parameterPart, $apiKey) {
	$utils = new Utils();
	return md5($parameterPart . '|' . $apiKey . '|' . $utils->getIPv4Addr() . '|' . time() / 600);
}

Assert::same(test($parameter, $apiKey), $utils->createSignature($parameter, $apiKey));
