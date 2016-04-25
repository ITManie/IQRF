<?php

namespace IQRF\Cloud\Response;

use IQRF\Cloud\Response;

/**
 * Data
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Response
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Data {

	/**
	 * Get data from response
	 * @param string $response
	 * @return array
	 */
	public function getData($response) {
		$array = array_map(function($value) {
			return array_slice(explode(';', trim($value, ';')), 0);
		}, explode('\r\n', trim($response, '\\r\\n')));
		return $array;
	}

	/**
	 * Get data send via API from response
	 * @param string $response
	 * @return \IQRF\Cloud\Response\DataAPI
	 */
	public function getAPI($response) {
		return new Response\DataAPI($this->getData($response));
	}

	/**
	 * Get data send via GW from response
	 * @param string $response
	 * @return \IQRF\Cloud\Response\DataGW
	 */
	public function getGW($response) {
		return new Response\DataGW($this->getData($response));
	}

}
