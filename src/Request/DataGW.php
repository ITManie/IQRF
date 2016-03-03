<?php

namespace ITManie\IQRF\Request;

use ITManie\IQRF\IQRF,
	ITManie\IQRF\Config,
	ITManie\IQRF\Utils;

class DataGW {

	/**
	 * Get lasted data from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getLast($gatewayID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&last=1&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get new data from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getNew($gatewayID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&new=1&count=' . $count;
		return $utils->createRequest($parameter);
	}

}
