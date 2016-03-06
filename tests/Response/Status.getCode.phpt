<?php

/**
 * TEST: IQRF\Cloud\Response\Status
 * @phpVersion >= 5.5
 */

use IQRF\Cloud\Response\Status,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$status = new Status();

$array = ['ERROR 1' => 'Data string exceeds 64B.',
	'ERROR 2' => 'Unfilled required fields. Required parameter(s) missing.',
	'ERROR 3' => 'No data sent. Writing error, data has not been written.',
	'ERROR 4' => 'Data access denied. The user has no access to given GW.',
	'ERROR 5' => 'Incorrect username or password.',
	'ERROR 6' => 'No data for specified request.',
	'ERROR 7' => 'Error issued by MySQL server when attempting to write to the database.',
	'ERROR 8' => 'Incorrectly completed parameter new.',
	'ERROR 9' => 'Incorrect data format. Every byte of binary data must be converted to 2 bytes corresponding to its hexadecimal value in ASCII representation.',
	'ERROR 10' => 'Device is already assigned.',
	'ERROR 11' => 'Incorrect password to GW.',
	'ERROR 12' => 'Incorrect user.',
	'ERROR 13' => 'The device can not be changed. Device is not assigned to a given user account.',
	'ERROR 14' => 'The device can not be changed. Incorrect password.',
	'ERROR 15' => 'The device can not be added.',
	'ERROR 16' => 'Maximum count of GW is reached according to user\'s license.',
	'ERROR 17' => 'User does not have API key.',
	'ERROR 18' => 'Incorrect signature.',
	'Invalid response.' => 'ERROR'];

Assert::same('OK', $status->getCode('OK'));
foreach ($array as $code => $message) {
	Assert::same($code, $status->getCode($code . ';' . $message));
}
