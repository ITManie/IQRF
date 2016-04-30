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
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Data {

	/**
	 * Send data to IQRF Cloud
	 * @param string $gwID Gateway ID
	 * @param mixed $data Data
	 * @return string Response to the request
	 */
	public function send($gwID, $data) {
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' .
				$gwID . '&cmd=uplc&data=' . $data;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get cloud info
	 * @return string Response to the request
	 */
	public function getCloudInfo() {
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&cmd=info';
		return $iqrf->createRequest($param);
	}

}
