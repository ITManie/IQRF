<?php

namespace IQRF\Cloud\Response;

use Nette\Utils\Arrays;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Response
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
