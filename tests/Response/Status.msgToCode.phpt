<?php

use ITManie\IQRF\Response\Status,
	Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$status = new Status();

Assert::same('OK', $status->codeToMsg('OK'));
Assert::same('Data string exceeds 64B.', $status->codeToMsg('ERROR 1'));
Assert::same('Unfilled required fields. Required parameter(s) missing.', $status->codeToMsg('ERROR 2'));
Assert::same('No data sent. Writing error, data has not been written.', $status->codeToMsg('ERROR 3'));
Assert::same('Data access denied. The user has no access to given GW.', $status->codeToMsg('ERROR 4'));
Assert::same('Incorrect username or password.', $status->codeToMsg('ERROR 5'));
Assert::same('No data for specified request.', $status->codeToMsg('ERROR 6'));
Assert::same('Error issued by MySQL server when attempting to write to the database.', $status->codeToMsg('ERROR 7'));
Assert::same('Incorrectly completed parameter new.', $status->codeToMsg('ERROR 8'));
Assert::same('Incorrect data format. Every byte of binary data must be converted to 2 bytes corresponding to its hexadecimal value in ASCII representation.', $status->codeToMsg('ERROR 9'));
Assert::same('Device is already assigned.', $status->codeToMsg('ERROR 10'));
Assert::same('Incorrect password to GW.', $status->codeToMsg('ERROR 11'));
Assert::same('Incorrect user.', $status->codeToMsg('ERROR 12'));
Assert::same('The device can not be changed. Device is not assigned to a given user account.', $status->codeToMsg('ERROR 13'));
Assert::same('The device can not be changed. Incorrect password.', $status->codeToMsg('ERROR 14'));
Assert::same('The device can not be added.', $status->codeToMsg('ERROR 15'));
Assert::same('Maximum count of GW is reached according to user\'s license.', $status->codeToMsg('ERROR 16'));
Assert::same('User does not have API key.', $status->codeToMsg('ERROR 17'));
Assert::same('Incorrect signature.', $status->codeToMsg('ERROR 18'));
Assert::same('Invalid status code.', $status->codeToMsg('ERROR'));
