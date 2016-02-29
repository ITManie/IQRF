<?php

namespace ITManie\IQRF;

use GuzzleHttp\Client;

class Utils {

	/**
	 * Get IPv4 of server
	 * @return string IPv4 address
	 */
	public function getIPv4Addr() {
		$client = new Client(['base_uri' => 'http://whatismyip.akamai.com/']);
		return $client->request('GET')->getBody()->getContents();
	}
	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $parameterPart
	 * @param string $apiKey
	 * @return string md5 hash
	 */
	public function createSignature($parameterPart, $apiKey) {
		$time = time() / 600;
		$md5 = md5($parameterPart . '|' . $apiKey . '|' . $this->getIPv4Addr() . '|' . $time);
		return $md5;
	}

}
