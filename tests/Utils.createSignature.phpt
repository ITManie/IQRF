<?php

/**
 * TEST: IQRF\Cloud\Utils
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();
$hash = 'd03fb02a068744811911f5a5fa7dcd6f';
$parameter = 'ver=2&uid=123&gid=0d000001&cmd=uplc&data=616263';
$apiKey = '12345678901234567890123456789012';
$ipv4 = '127.0.0.1';
$time = 1456758380;

Assert::same($hash, $utils->createSignature($parameter, $apiKey, $ipv4, $time));
