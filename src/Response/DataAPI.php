<?php

namespace IQRF\Cloud\Response;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Response
 */
class DataAPI {

	/**
	 * Get data send via API from response
	 * @param string $response
	 * @return array
	 */
	public static function getData($response) {
		$array = array_map(function($value) {
			return array_slice(explode(';', $value), 0, 5);
		}, explode('\r\n', trim($response, '\\r\\n')));
		return $array;
	}

}
