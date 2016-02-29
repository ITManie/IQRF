<?php

namespace ITManie\IQRF\Request;

use ITManie\IQRF\IQRF,
	ITManie\IQRF\Config,
	ITManie\IQRF\Utils,
	GuzzleHttp\Client;

class DataGW {

	/**
	 * Get lasted data from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getLast($gatewayID, $count = 1) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&gid=' . $gatewayID . '&cmd=dnld&last=1&count=' . $count;
		$signature = Utils::createSignature($parameter, Config::getApiKey());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}
	
	/**
	 * Get new data from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getNew($gatewayID, $count = 1) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . Config::getUserID() . '&gid=' . $gatewayID . '&cmd=dnld&new=1&count=' . $count;
		$signature = Utils::createSignature($parameter, Config::getApiKey());
		$parameter += '&signature=' . $signature;
		$client = new Client(['base_uri' => IQRF::API_URI]);
		$response = $client->request('GET', $parameter);
		return $response;
	}

}
