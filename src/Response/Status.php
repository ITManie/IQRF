<?php

namespace IQRF\Cloud\Response;

use Nette\Utils\Strings,
	Nette\Utils\Validators;

/**
 * Status
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Response
 */
class Status {

	/**
	 * Get status code from response
	 * @param string $response Response
	 * @return string Status code
	 */
	public function getCode($response) {
		if ($response == 'OK') {
			return 'OK';
		} else if (Strings::startsWith($response, 'ERROR ') &&
				Validators::isInRange(explode(' ', $response)[1], [1, 18])) {
			return explode(';', $response)[0];
		} else {
			return 'Invalid response.';
		}
	}

	/**
	 * Get status code from response
	 * @param string $response Response
	 * @return string Status message
	 */
	public function getMessage($response) {
		if ($response == 'OK') {
			return 'OK';
		} else if (Strings::startsWith($response, 'ERROR ') &&
				Validators::isInRange(explode(' ', $response)[1], [1, 18])) {
			return explode(';', $response)[1];
		} else {
			return 'Invalid response.';
		}
	}

}
