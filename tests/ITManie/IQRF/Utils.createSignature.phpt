<?php

use ITManie\IQRF\Utils,
	Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

Tester\Environment::setup();

function test($parameterPart, $apiKey) {
	return md5($parameterPart . '|' . $apiKey . '|' . $_SERVER['SERVER_ADDR'] . '|' . time() / 600);
}
$utils = new Utils();
$parameter = 'ver=2&uid=test&gid=0d000001&cmd=uplc&data=616263';
$apiKey = '12345678901234567890123456789012';
Assert::same(test($parameter, $apiKey), $utils->createSignature($parameter, $apiKey));
