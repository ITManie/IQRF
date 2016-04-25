<?php

/**
 * TEST: IQRF\Cloud\Response\Data
 * @phpVersion >= 5.5
 */
use IQRF\Cloud\Response\DataAPI,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$response = [['17'],
	['8', '000200000000FFFF0000', '2016-03-30 20:39:34', 'confirmed', '2016-03-30 20:39:41'],];
$data = new DataAPI($response);
Assert::same('000200000000FFFF0000', $data->getID(8)->getValue());
