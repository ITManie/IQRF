<?php

namespace IQRF\Cloud;

use IQRF\Cloud\IQRF,
	GuzzleHttp\Client;

/**
 * Utils
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Utils {

	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $parameterPart Parameter of request
	 * @param string $apiKey API key
	 * @param string $ipAddr IPv4 address of the server
	 * @param int $time Epoch time
	 * @return string md5 hash
	 */
	public function createSignature($parameterPart, $apiKey, $ipAddr, $time) {
		return md5($parameterPart . '|' . $apiKey . '|' . $ipAddr . '|'
				. round($time / 600));
	}

	/**
	 * Create request
	 * @param string $parameter Parameter of request
	 * @return mixed Response
	 */
	public static function createRequest($parameter) {
		$iqrf = new IQRF();
		$signature = $this->createSignature($parameter, $iqrf->getApiKey(), $iqrf->getIpAddr(), time());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}

}
