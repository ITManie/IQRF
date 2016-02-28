<?php

namespace ITManie\IQRF;

class Utils {

	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $parameterPart
	 * @param string $apiKey
	 * @return string md5 hash
	 */
	public function createSignature($parameterPart, $apiKey) {
		$ipAddr = $_SERVER['SERVER_ADDR'];
		$time = time() / 600;
		$md5 = md5($parameterPart . '|' . $apiKey . '|' . $ipAddr . '|' . $time);
		return $md5;
	}

}
