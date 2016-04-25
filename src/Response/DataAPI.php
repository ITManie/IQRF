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
	 * @throws \InvalidArgumentException
	 */
	public function getValue() {
		if (empty($this->id)) {
			throw new \InvalidArgumentException('ID is empty');
		}
		return $this->data[$this->id][1];
	}

}
