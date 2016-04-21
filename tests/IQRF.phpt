<?php

/**
 * TEST: IQRF\Cloud\IQRF
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\IQRF,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';
$ipAddr = '127.0.0.1';
$userName = 'admin';
$iqrf = new IQRF($apiKey, $ipAddr, $userName);

Assert::same($apiKey, $iqrf->getApiKey());
Assert::same($ipAddr, $iqrf->getIpAddr());
Assert::same($userName, $iqrf->getUserName());
