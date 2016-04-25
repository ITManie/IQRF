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

use IQRF\Cloud\Utils;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud~Request
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class DataAPI {

	/**
	 * Get latest data from the Cloud (incoming from the API)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getLast($apiVer, $userName, $gatewayID, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&last=1&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get new data from the Cloud (incoming from the API)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getNew($apiVer, $userName, $gatewayID, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&new=1&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data from message ID from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $messageID From message ID
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getFrom($apiVer, $userName, $gatewayID, $messageID, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&from=' . $messageID . '&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data to message ID from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $messageID To message ID
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getTo($apiVer, $userName, $gatewayID, $messageID, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&to=' . $messageID . '&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data from and to message IDs from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $from From message ID
	 * @param int $to To message ID
	 * @return string $response Response to the request
	 */
	public function getFromTo($apiVer, $userName, $gatewayID, $from, $to) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&from=' . $from . '&to=' . $to;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data from time of message from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $fromTime Time from sending message
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getFromTime($apiVer, $userName, $gatewayID, $fromTime, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&from_time=' . $fromTime . '&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data to time of message from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $toTime Time to sending message
	 * @param int $count The number of messages
	 * @return string $response Response to the request
	 */
	public function getToTime($apiVer, $userName, $gatewayID, $toTime, $count = 1) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&to_time=' . $toTime . '&count=' . $count;
		return Utils::createRequest($parameter);
	}

	/**
	 * Get data from time of message and to time of message from the Cloud (incoming from the GW)
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param int $fromTime Time from sending message
	 * @param int $toTime Time to sending message
	 * @return string $response Response to the request
	 */
	public function getFromTimeToTime($apiVer, $userName, $gatewayID, $fromTime, $toTime) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=dnlc&from_time=' . $fromTime . '&to_time=' . $toTime;
		return Utils::createRequest($parameter);
	}

	/**
	 * Send data to IQRF Cloud
	 * @param int $apiVer API version
	 * @param string $userName User name
	 * @param string $gatewayID Gateway ID
	 * @param mixed $data Data
	 * @return string $response Response to the request
	 */
	public function send($apiVer, $userName, $gatewayID, $data) {
		$parameter = 'ver=' . $apiVer . '&uid=' . $userName . '&gid=' . $gatewayID
				. '&cmd=uplc&data=' . $data;
		return Utils::createRequest($parameter);
	}

}
