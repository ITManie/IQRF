<?php

namespace ITManie\IQRF\Request;

use ITManie\IQRF\IQRF,
	ITManie\IQRF\Config,
	ITManie\IQRF\Utils,
	GuzzleHttp\Client;

class DataAPI {

	/**
	 * Get lasted data from the Cloud (incoming from the API)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getLast($gatewayID, $count = 1) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&gid=' . $gatewayID . '&cmd=dnlc&last=1&count=' . $count;
		$signature = Utils::createSignature($parameter, Config::getApiKey());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}
	
	/**
	 * Get new data from the Cloud (incoming from the API)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getNew($gatewayID, $count = 1) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&gid=' . $gatewayID . '&cmd=dnlc&new=1&count=' . $count;
		$signature = Utils::createSignature($parameter, Config::getApiKey());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}


	/**
	 * Send data to IQRF Cloud
	 * @param int $gatewayID ID of gateway
	 * @param mixed $data Data
	 * @return string $response Response of request
	 */
	public function send($gatewayID, $data) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&gid=' . $gatewayID . '&cmd=uplc&data=' . $data;
		$signature = Utils::createSignature($parameter, Config::getApiKey());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}
}
