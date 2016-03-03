<?php

namespace ITManie\IQRF\Request;

use ITManie\IQRF\IQRF,
	ITManie\IQRF\Config,
	ITManie\IQRF\Utils;

class DataAPI {

	/**
	 * Get lasted data from the Cloud (incoming from the API)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getLast($gatewayID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnlc&last=1&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get new data from the Cloud (incoming from the API)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getNew($gatewayID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnlc&new=1&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Send data to IQRF Cloud
	 * @param int $gatewayID ID of gateway
	 * @param mixed $data Data
	 * @return string $response Response of request
	 */
	public function send($gatewayID, $data) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=uplc&data=' . $data;
		return $utils->createRequest($parameter);
	}

}
