<?php

namespace IQRF\Cloud\Response;

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

}
