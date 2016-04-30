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

use GuzzleHttp\Client;
use Nette\Object;

/**
 * IQRF
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class IQRF extends Object {

	/**
	 * @var Config $config
	 */
	private $config;
	protected $httpClient;

	/**
	 * @param string $apiKey API key
	 * @param string $ipAddr Server IPv4 address
	 * @param str $userName User name
	 */
	public function __construct(Config $config, Client $httpClient) {
		$this->config = $config;
		$this->httpClient = $httpClient;
	}

	/**
	 * Get configuration
	 * @return Config
	 */
	public function getConfig() {
		return $this->config;
	}

	/**
	 * Get HTTP Client
	 * @return Client
	 */
	public function getHttpClient() {
		return $this->httpClient;
	}

	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $param Parameter of request
	 * @param int $time Epoch time
	 * @return string md5 hash
	 */
	public function createSignature($param, $time) {
		return md5($param . '|' . $this->config->getApiKey() . '|' .
				$this->config->getIpAddr() . '|' . round($time / 600));
	}

	/**
	 * Create request
	 * @param string $param Parameter of request
	 * @return mixed Response
	 */
	public function createRequest($param) {
		$url = $this->config->getApiUrl() . '?' . $param . '&signature=' . $this->createSignature($param, time());
		return $this->httpClient->get($url)->getBody()->getContents();
	}

}
