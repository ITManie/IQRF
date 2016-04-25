<?php

/**
 * TEST: IQRF\Cloud\Response\DataGW
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataGW,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
$data = new DataGW($response);
Assert::same('2016-03-31 17:43:12', $data->getID(67)->getTime());

Assert::exception(function() {
	$response = [['76'], ['67', '2016-03-31 17:43:12', 'DE01FF'],];
	$data = new DataGW($response);
	Assert::same($data, $data->getTime());
}, 'InvalidArgumentException', 'ID is empty');
