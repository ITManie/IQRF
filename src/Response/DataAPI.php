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
class DataAPI {

	/**
	 * @var array Data
	 */
	private $data;

	/**
	 * @var int ID
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
	 * @return array Data
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Get count
	 * @return string Count
	 */
	public function getCount() {
		return $this->data[0][0];
	}

	/**
	 * Get first ID
	 * @return string First ID
	 */
	public function getFirstID() {
		return $this->data[1][0];
	}

	/**
	 * Get lasted ID
	 * @return string Lasted ID
	 */
	public function getLastedID() {
		return end($this->data)[0];
	}

	/**
	 * Get data from ID
	 * @param int $id
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
	 * @return string Sended data
	 * @throws \InvalidArgumentException ID is empty
	 */
	public function getValue() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][1];
	}

	/**
	 * Get date send time
	 * @return string Date send time
	 * @throws \InvalidArgumentException ID is empty
	 */
	public function getSendTime() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][2];
	}

	/**
	 * Get data status
	 * @return string Status
	 * @throws \InvalidArgumentException ID is empty
	 */
	public function getStatus() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][3];
	}

	/**
	 * Get data received time
	 * @return string Datetime
	 * @throws \InvalidArgumentException ID is empty
	 * @throws \BadFunctionCallException Data has not yet been received
	 */
	public function getReceiveTime() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		} else if ($this->getStatus() == 'sent' || $this->getStatus() == 'confirmed') {
			return $this->data[$this->id][4];
		} else {
			throw new \BadFunctionCallException('Data has not yet been received');
		}
	}

}
