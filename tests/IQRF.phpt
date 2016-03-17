<?php

/**
 * TEST: IQRF\Cloud\IQRF
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\IQRF,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';


$apiKey = 'k6wuaem3wtaiupmnuc7cziuvaup2fxim';
$userID = 123;
$iqrf = new IQRF($apiKey, $userID);

Assert::same($apiKey, $iqrf->getApiKey());
Assert::same($userID, $iqrf->getUserID());
