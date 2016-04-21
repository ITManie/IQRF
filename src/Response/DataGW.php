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
	 * Get data send via API from response
	 * @param string $response
	 * @return array
	 */
	public static function getData($response) {
		$array = array_map(function($value) {
			return array_slice(explode(';', trim($value, ';')), 0);
		}, explode('\r\n', trim($response, '\\r\\n')));
		return $array;
	}

}
