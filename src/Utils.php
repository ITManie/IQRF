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

namespace IQRF\Cloud;

use IQRF\Cloud\IQRF,
	GuzzleHttp\Client;

/**
 * Utils
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Utils {

	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $parameterPart Parameter of request
	 * @param string $apiKey API key
	 * @param string $ipAddr IPv4 address of the server
	 * @param int $time Epoch time
	 * @return string md5 hash
	 */
	public function createSignature($parameterPart, $apiKey, $ipAddr, $time) {
		return md5($parameterPart . '|' . $apiKey . '|' . $ipAddr . '|'
				. round($time / 600));
	}

	/**
	 * Create request
	 * @param string $parameter Parameter of request
	 * @return mixed Response
	 */
	public static function createRequest($parameter) {
		$iqrf = new IQRF();
		$signature = $this->createSignature($parameter, $iqrf->getApiKey(), $iqrf->getIpAddr(), time());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}

}
