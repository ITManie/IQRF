<?php

/**
 * Copyright (C) 2016  Roman Ondráček
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace IQRF\Cloud\Request;

use IQRF\Cloud\IQRF;

/**
 * Gateway
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\Request
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Gateway {

	/**
	 * Add new gateway
	 * @param string $gwID Gateway ID
	 * @param string $gwPW Gateway password
	 * @return string Response to the request
	 */
	public function add($gwID, $gwPW) {
		$iqrf = new IQRF;
		$ver = $iqrf->getConfig()->getApiVer();
		$user = $iqrf->getConfig()->getUserName();
		$param = 'ver=' . $ver . '&uid=' . $user . '&gid=' . $gwID . '&gpw=' . $gwPW . '&cmd=add';
		return $iqrf->createRequest($param);
	}

	/**
	 * Remove gateway
	 * @param string $gwID Gateway ID
	 * @return string Response to the request
	 */
	public function remove($gwID) {
		$iqrf = new IQRF;
		$ver = $iqrf->getConfig()->getApiVer();
		$user = $iqrf->getConfig()->getUserName();
		$param = 'ver=' . $ver . '&uid=' . $user . '&gid=' . $gwID . '&cmd=rem';
		return $iqrf->createRequest($param);
	}

	/**
	 * Edit gateway
	 * @param string $gwID Gateway ID
	 * @param string $gwAlias Gateway alias
	 * @return string Response to the request
	 */
	public function edit($gwID, $gwAlias) {
		$iqrf = new IQRF;
		$ver = $iqrf->getConfig()->getApiVer();
		$user = $iqrf->getConfig()->getUserName();
		$param = 'ver=' . $ver . '&uid=' . $user . '&gid=' . $gwID . '&cmd=edit&alias=' . $gwAlias;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get list of gateways
	 * @return string Response to the request
	 */
	public function getList() {
		$iqrf = new IQRF;
		$ver = $iqrf->getConfig()->getApiVer();
		$user = $iqrf->getConfig()->getUserName();
		$param = 'ver=' . $ver . '&uid=' . $user . '&cmd=list';
		return $iqrf->createRequest($param);
	}

	/**
	 * Get gateway info
	 * @param string $gwID Gateway ID
	 * @return string Response to the request
	 */
	public function getInfo($gwID) {
		$iqrf = new IQRF;
		$ver = $iqrf->getConfig()->getApiVer();
		$user = $iqrf->getConfig()->getUserName();
		$param = 'ver=' . $ver . '&uid=' . $user . '&gid=' . $gwID . '&cmd=info';
		return $iqrf->createRequest($param);
	}

}
