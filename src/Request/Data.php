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

namespace IQRF\Cloud\Request;

use IQRF\Cloud\Utils;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Request
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Data {

	/**
	 * Send data to IQRF Cloud
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param mixed $data Data
	 * @return string $response Response to the request
	 */
	public function send($apiVer, $userName, $gatewayID, $data) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=uplc&data=' . $data;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get cloud info
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @return string $response Response to the request
	 */
	public function getCloudInfo($apiVer, $userName) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&cmd=info';
		return Utils::createRequest($parameter);
	}

}
