<?php

/**
 * TEST: IQRF\Cloud\Response\Data
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataGW,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
$data = new DataGW($response);
Assert::same($data, $data->getID(76));

Assert::exception(function() {
	$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
	$data = new DataGW($response);
	Assert::same($data, $data->getID(100));
}, 'OutOfRangeException', 'Non exist ID');