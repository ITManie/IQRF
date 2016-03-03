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

	/**
	 * Get data from message ID from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $messageID From message ID
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getFrom($gatewayID, $messageID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&from=' . $messageID . '&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get data to message ID from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $messageID To message ID
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getTo($gatewayID, $messageID, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&to=' . $messageID . '&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get data from and to message IDs from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $from From message ID
	 * @param int $to To message ID
	 * @return string $response Response of request
	 */
	public function getFromTo($gatewayID, $from, $to) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&from=' . $from . '&to=' . $to;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get data from time of message ID from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $fromTime From time of message
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getFromTime($gatewayID, $fromTime, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&from_time=' . $fromTime . '&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get data to time of message ID from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $toTime To time of message
	 * @param int $count Count of lasted messages
	 * @return string $response Response of request
	 */
	public function getToTime($gatewayID, $toTime, $count = 1) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&to_time=' . $toTime . '&count=' . $count;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get data from and to message IDs from the Cloud (incoming from the GW)
	 * @param int $gatewayID ID of gateway
	 * @param int $fromTime From time of message
	 * @param int $toTime To time of message
	 * @return string $response Response of request
	 */
	public function getFromTimeToTime($gatewayID, $fromTime, $toTime) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=dnld&from_time=' . $fromTime . '&to_time=' . $toTime;
		return $utils->createRequest($parameter);
	}

}
