<?php

namespace IQRF\Cloud\Request;

use IQRF\Cloud\IQRF,
	IQRF\Cloud\Config,
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
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&gpw=' . $gatewayPW . '&cmd=add';
		return $utils->createRequest($parameter);
	}

	/**
	 * Remove gateway
	 * @param int $gatewayID Gateway ID
	 */
	public function remove($gatewayID) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=rem';
		return $utils->createRequest($parameter);
	}

	/**
	 * Edit gateway
	 * @param int $gatewayID Gateway ID
	 * @param string $gatewayAlias Gateway alias
	 */
	public function edit($gatewayID, $gatewayAlias) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=edit&alias=' . $gatewayAlias;
		return $utils->createRequest($parameter);
	}

	/**
	 * Get list of gateways
	 */
	public function getList() {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID() . '&cmd=list';
		return $utils->createRequest($parameter);
	}

	/**
	 * Get gateway info
	 * @param int $gatewayID Gateway ID
	 */
	public function getInfo($gatewayID) {
		$config = new Config();
		$utils = new Utils();
		$parameter = 'ver=' . IQRF::API_VER . '&uid=' . $config->getUserID()
				. '&gid=' . $gatewayID . '&cmd=info';
		return $utils->createRequest($parameter);
	}

}
