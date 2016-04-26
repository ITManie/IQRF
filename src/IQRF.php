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

use Nette\Utils\Validators;

/**
 * IQRF
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class IQRF extends \Nette\Object {

	/**
	 * @var string API URL
	 */
	const API_URI = 'https://cloud.iqrf.org/api/api.php?';

	/**
	 * @var string API version
	 */
	const API_VER = '2';

	/**
	 * @var string API key
	 */
	private $apiKey;

	/**
	 * @var string Server IPv4 address
	 */
	private $ipAddr;

	/**
	 * @var string User name
	 */
	private $userName;

	/**
	 * @param string $apiKey API key
	 * @param string $ipAddr Server IPv4 address
	 * @param str $userName User name
	 */
	public function __construct($apiKey, $ipAddr, $userName) {
		Validators::assert($apiKey, 'string', 'apiKey');
		Validators::assert($ipAddr, 'string', 'ipAddr');
		Validators::assert($userName, 'string', 'userName');

		$this->apiKey = $apiKey;
		$this->ipAddr = $ipAddr;
		$this->userName = $userName;
	}

	/**
	 * Get API key
	 * @return string API key
	 */
	public function getApiKey() {
		return $this->apiKey;
	}

	/**
	 * Get Server IPv4 address
	 * @return string Server IPv4 address
	 */
	public function getIpAddr() {
		return $this->ipAddr;
	}

	/**
	 * Get User name
	 * @return string User name
	 */
	public function getUserName() {
		return $this->userName;
	}

}
