<?php

/**
 * Copyright (C) 2016  Roman Ondráček
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

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
