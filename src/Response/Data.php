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

use IQRF\Cloud\Response;

/**
 * Data
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Data {

	/**
	 * Get data from response
	 * @param string $response
	 * @return array
	 */
	public function getData($response) {
		$array = array_map(function($value) {
			return array_slice(explode(';', trim($value, ';')), 0);
		}, explode('\r\n', trim($response, '\\r\\n')));
		return $array;
	}

	/**
	 * Get data send via API from response
	 * @param string $response
	 * @return \IQRF\Cloud\Response\DataAPI
	 */
	public function getAPI($response) {
		return new Response\DataAPI($this->getData($response));
	}

	/**
	 * Get data send via GW from response
	 * @param string $response
	 * @return \IQRF\Cloud\Response\DataGW
	 */
	public function getGW($response) {
		return new Response\DataGW($this->getData($response));
	}

}
