<?php

namespace IQRF\Cloud\Response;

use Nette\Utils\Strings,
	Nette\Utils\Validators;

/**
 * Status
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Response
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
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
			throw new \OutOfRangeException('Invalid response');
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
			throw new \OutOfRangeException('Invalid response');
		}
	}

}
