<?php

/**
 * TEST: IQRF\Cloud\Response\DataAPI
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataAPI,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$response = [['17'],
	['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],
	['9', '000200000000FFFF0000', '2016-03-30 20:40:25', 'sent', '2016-03-30 20:41:11'],
	['10', '000200000000FFFF0000', '2016-03-30 20:41:34', 'expired'],
	['11', '000200000000FFFF0000', '2016-03-30 20:42:25', 'not­picked'],];
$data = new DataAPI($response);

Assert::same('confirmed', $data->getID(8)->getStatus());
Assert::same('sent', $data->getID(9)->getStatus());
Assert::same('expired', $data->getID(10)->getStatus());
Assert::same('not­picked', $data->getID(11)->getStatus());
Assert::exception(function() {
	$response = [['17'], ['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],];
	$data = new DataAPI($response);
	Assert::same($data, $data->getStatus());
}, 'InvalidArgumentException', 'ID is empty');
