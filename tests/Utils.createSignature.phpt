<?php

use ITManie\IQRF\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$parameter = 'ver=2&uid=test&gid=0d000001&cmd=uplc&data=616263';
$apiKey = '12345678901234567890123456789012';

function test($parameterPart, $apiKey) {
	$ipAddr = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : exec("hostname");
	return md5($parameterPart . '|' . $apiKey . '|' . $ipAddr . '|' . time() / 600);
}

$utils = new Utils();
Assert::same(test($parameter, $apiKey), $utils->createSignature($parameter, $apiKey));
