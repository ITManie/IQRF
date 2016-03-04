<?php

namespace IQRF\Cloud;

use IQRF\Cloud\Config,
	GuzzleHttp\Client;

/**
 * Utils
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 */

class Utils {

	/**
	 * Get IPv4 of server
	 * @return string IPv4 address
	 */
	public function getIPv4Addr() {
		$client = new Client(['base_uri' => 'https://api.ipify.org']);
		return $client->request('GET')->getBody()->getContents();
	}

	/**
	 * Create md5 hash for IQRF API signature
	 * @param string $parameterPart Parameter of request
	 * @param string $apiKey API key
	 * @param string $ipAddr IPv4 address of the server
	 * @param int $time Epoch time
	 * @return string md5 hash
	 */
	public function createSignature($parameterPart, $apiKey, $ipAddr, $time) {
		$md5 = md5($parameterPart . '|' . $apiKey . '|' . $ipAddr . '|' . round($time / 600));
		return $md5;
	}

	/**
	 * Create request
	 * @param string $parameter Parameter of request
	 * @return mixed Response
	 */
	public function createRequest($parameter) {
		$config = new Config();
		$signature = $this->createSignature($parameter, $config->getApiKey(), $this->getIPv4Addr(), time());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}

}
