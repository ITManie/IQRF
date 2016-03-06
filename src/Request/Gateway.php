<?php

namespace IQRF\Cloud\Request;

use IQRF\Cloud\Utils;

/**
 * Gateway
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Request
 */
class Gateway {

	/**
	 * Add new gateway
	 * @param int $apiVer API version
	 * @param int $userID User ID
	 * @param int $gatewayID Gateway ID
	 * @param string $gatewayPW Gateway password
	 * @return string $response Response to the request
	 */
	public function add($apiVer, $userID, $gatewayID, $gatewayPW) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userID . '&gid=' . $gatewayID
				. '&gpw=' . $gatewayPW . '&cmd=add';
		return Utils::createRequest($parameter);
	}

	/**
	 * Remove gateway
	 * @param int $apiVer API version
	 * @param int $userID User ID
	 * @param int $gatewayID Gateway ID
	 * @return string $response Response to the request
	 */
	public function remove($apiVer, $userID, $gatewayID) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userID . '&gid=' . $gatewayID
				. '&cmd=rem';
		return Utils::createRequest($parameter);
	}

	/**
	 * Edit gateway
	 * @param int $apiVer API version
	 * @param int $userID User ID
	 * @param int $gatewayID Gateway ID
	 * @param string $gatewayAlias Gateway alias
	 * @return string $response Response to the request
	 */
	public function edit($apiVer, $userID, $gatewayID, $gatewayAlias) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userID . '&gid=' . $gatewayID
				. '&cmd=edit&alias=' . $gatewayAlias;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get list of gateways
	 * @param int $apiVer API version
	 * @param int $userID User ID
	 * @return string $response Response to the request
	 */
	public function getList($apiVer, $userID) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userID . '&cmd=list';
		return Utils::createRequest($parameter);
	}

	/**
	 * Get gateway info
	 * @param int $apiVer API version
	 * @param int $userID User ID
	 * @param int $gatewayID Gateway ID
	 * @return string $response Response to the request
	 */
	public function getInfo($apiVer, $userID, $gatewayID) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userID . '&gid=' . $gatewayID
				. '&cmd=info';
		return Utils::createRequest($parameter);
	}

}
