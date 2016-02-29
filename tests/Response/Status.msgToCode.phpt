<?php

use ITManie\IQRF\Response\Status,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$status = new Status();

Assert::same($status->msgToCode('OK'), 'OK');
Assert::same($status->msgToCode('Data string exceeds 64B.'), 'ERROR 1');
Assert::same($status->msgToCode('Unfilled required fields. Required parameter(s) missing.'), 'ERROR 2');
Assert::same($status->msgToCode('No data sent. Writing error, data has not been written.'), 'ERROR 3');
Assert::same($status->msgToCode('Data access denied. The user has no access to given GW.'), 'ERROR 4');
Assert::same($status->msgToCode('Incorrect username or password.'), 'ERROR 5');
Assert::same($status->msgToCode('No data for specified request.'), 'ERROR 6');
Assert::same($status->msgToCode('Error issued by MySQL server when attempting to write to the database.'), 'ERROR 7');
Assert::same($status->msgToCode('Incorrectly completed parameter new.'), 'ERROR 8');
Assert::same($status->msgToCode('Incorrect data format. Every byte of binary data must be converted to 2 bytes corresponding to its hexadecimal value in ASCII representation.'), 'ERROR 9');
Assert::same($status->msgToCode('Device is already assigned.'), 'ERROR 10');
Assert::same($status->msgToCode('Incorrect password to GW.'), 'ERROR 11');
Assert::same($status->msgToCode('Incorrect user.'), 'ERROR 12');
Assert::same($status->msgToCode('The device can not be changed. Device is not assigned to a given user account.'), 'ERROR 13');
Assert::same($status->msgToCode('The device can not be changed. Incorrect password.'), 'ERROR 14');
Assert::same($status->msgToCode('The device can not be added.'), 'ERROR 15');
Assert::same($status->msgToCode('Maximum count of GW is reached according to user\'s license.'), 'ERROR 16');
Assert::same($status->msgToCode('User does not have API key.'), 'ERROR 17');
Assert::same($status->msgToCode('Incorrect signature.'), 'ERROR 18');
Assert::same($status->msgToCode('ERROR'), 'Invalid status code.');
