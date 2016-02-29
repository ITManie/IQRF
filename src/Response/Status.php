<?php

namespace ITManie\IQRF\Response;

class Status {

	/**
	 * Convert status code to status message
	 * @param string $code Status code
	 * @return string Status message
	 */
	public function codeToMsg($code) {
		switch ($code) {
			case 'OK':
				return 'OK';
			case 'ERROR 1':
				return 'Data string exceeds 64B.';
			case 'ERROR 2':
				return 'Unfilled required fields. Required parameter(s) missing.';
			case 'ERROR 3':
				return 'No data sent. Writing error, data has not been written.';
			case 'ERROR 4':
				return 'Data access denied. The user has no access to given GW.';
			case 'ERROR 5':
				return 'Incorrect username or password.';
			case 'ERROR 6':
				return 'No data for specified request.';
			case 'ERROR 7':
				return 'Error issued by MySQL server when attempting to write to the database.';
			case 'ERROR 8':
				return 'Incorrectly completed parameter new.';
			case 'ERROR 9':
				return 'Incorrect data format. Every byte of binary data must be converted to 2 bytes corresponding to its hexadecimal value in ASCII representation.';
			case 'ERROR 10':
				return 'Device is already assigned.';
			case 'ERROR 11':
				return 'Incorrect password to GW.';
			case 'ERROR 12':
				return 'Incorrect user.';
			case 'ERROR 13':
				return 'The device can not be changed. Device is not assigned to a given user account.';
			case 'ERROR 14':
				return 'The device can not be changed. Incorrect password.';
			case 'ERROR 15':
				return 'The device can not be added.';
			case 'ERROR 16':
				return 'Maximum count of GW is reached according to user\'s license.';
			case 'ERROR 17':
				return 'User does not have API key.';
			case 'ERROR 18':
				return 'Incorrect signature.';
			default:
				return 'Invalid status code.';
		}
	}

}
