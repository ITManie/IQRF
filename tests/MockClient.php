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

/**
 * Mock HTTP Guzzle Client
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
use GuzzleHttp\Client;

class MockClient extends Client {

	/**
	 * @var string URL address
	 */
	private $param;

	/**
	 * Mock function get from GuzzleHttp\Client
	 * @param string $param URL address
	 * @return MockClient
	 */
	public function get($param) {
		$this->param = $param;
		return $this;
	}

	/**
	 * Mock function getBody from GuzzleHttp\Client
	 * @return MockClient
	 */
	public function getBody() {
		return $this;
	}

	/**
	 * Mock function getContents from GuzzleHttp\Client
	 * @return string URL address
	 */
	public function getContents() {
		return $this->param;
	}
}
