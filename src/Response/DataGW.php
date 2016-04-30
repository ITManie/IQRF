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

use Nette\Utils\Arrays;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class DataGW {

	/**
	 * @var array
	 */
	private $data;

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @param string $data
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Get data
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Get count
	 * @return string
	 */
	public function getCount() {
		return $this->data[0][0];
	}

	/**
	 * Get first ID
	 * @return string
	 */
	public function getFirstID() {
		return $this->data[1][0];
	}

	/**
	 * Get lasted ID
	 * @return string
	 */
	public function getLastedID() {
		return end($this->data)[0];
	}

	/**
	 * Get data from ID
	 * @param int $id Data ID
	 * @return \IQRF\Cloud\Response\DataAPI
	 * @throws \OutOfRangeException Non exist ID
	 */
	public function getID($id) {
		foreach ($this->data as $key => $value) {
			if ($value[0] == (string) $id) {
				$this->id = Arrays::searchKey($this->data, $key);
				return $this;
			}
		}
		if (empty($this->id)) {
			throw new \OutOfRangeException('Non exist ID');
		}
	}

	/**
	 * Get data value
	 * @return string Data value
	 * @throws \InvalidArgumentException ID is empty
	 */
	public function getValue() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][2];
	}

	/**
	 * Get time send data
	 * @return string time of send data
	 * @throws \InvalidArgumentException ID is empty
	 */
	public function getTime() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][1];
	}

}
