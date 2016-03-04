<?php

namespace IQRF\Cloud\Request;

use IQRF\Cloud\IQRF,
	IQRF\Cloud\Utils;

/**
 * Gateway
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Request
 */

class Gateway {

	/**
	 * Add new gateway
	 * @param int $gatewayID Gateway ID
	 * @param string $gatewayPW Gateway password
	 */
	public function add($gatewayID, $gatewayPW) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . IQRF::getUserID()
				. '&gid=' . $gatewayID . '&gpw=' . $gatewayPW . '&cmd=add';
		return Utils::createRequest($parameter);
	}

	/**
	 * Remove gateway
	 * @param int $gatewayID Gateway ID
	 */
	public function remove($gatewayID) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . IQRF::getUserID()
				. '&gid=' . $gatewayID . '&cmd=rem';
		return Utils::createRequest($parameter);
	}

	/**
	 * Edit gateway
	 * @param int $gatewayID Gateway ID
	 * @param string $gatewayAlias Gateway alias
	 */
	public function edit($gatewayID, $gatewayAlias) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . IQRF::getUserID()
				. '&gid=' . $gatewayID . '&cmd=edit&alias=' . $gatewayAlias;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get list of gateways
	 */
	public function getList() {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . IQRF::getUserID() . '&cmd=list';
		return Utils::createRequest($parameter);
	}

	/**
	 * Get gateway info
	 * @param int $gatewayID Gateway ID
	 */
	public function getInfo($gatewayID) {
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . IQRF::getUserID()
				. '&gid=' . $gatewayID . '&cmd=info';
		return Utils::createRequest($parameter);
	}

}
