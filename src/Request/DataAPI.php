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
use Nette\Utils\Validators;

/**
 * DataAPI
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class DataAPI {

	/**
	 * Get latest data from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getLast($gwID, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&last=1&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get new data from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getNew($gwID, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&new=1&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data from message ID from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $messageID From message ID
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getFrom($gwID, $messageID, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($messageID, 'int', 'messageID');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&from=' . $messageID . '&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data to message ID from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $messageID To message ID
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getTo($gwID, $messageID, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($messageID, 'int', 'messageID');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&to=' . $messageID . '&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data from and to message IDs from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $from From message ID
	 * @param int $to To message ID
	 * @return string Response to the request
	 */
	public function getFromTo($gwID, $from, $to) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($from, 'int', 'from');
		Validators::assert($to, 'int', 'to');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&from=' . $from . '&to=' . $to;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data from time of message from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $fromTime Time from sending message
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getFromTime($gwID, $fromTime, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($fromTime, 'string', 'fromTime');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&from_time=' . date('YmdHis', strtotime($fromTime)) . '&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data to time of message from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $toTime Time to sending message
	 * @param int $count The number of messages
	 * @return string Response to the request
	 */
	public function getToTime($gwID, $toTime, $count = 1) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($toTime, 'string', 'toTime');
		Validators::assert($count, 'int', 'count');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&to_time=' . date('YmdHis', strtotime($toTime)) . '&count=' . $count;
		return $iqrf->createRequest($param);
	}

	/**
	 * Get data from time of message and to time of message from the Cloud (incoming from the API)
	 * @param string $gwID Gateway ID
	 * @param int $fromTime Time from sending message
	 * @param int $toTime Time to sending message
	 * @return string Response to the request
	 */
	public function getFromTimeToTime($gwID, $fromTime, $toTime) {
		Validators::assert($gwID, 'string', 'gwID');
		Validators::assert($fromTime, 'string', 'fromTime');
		Validators::assert($toTime, 'string', 'toTime');
		$iqrf = IQRF::getInstance();
		$param = 'ver=2&uid=' . $iqrf->getConfig()->getUserName() . '&gid=' . $gwID .
				'&cmd=dnlc&from_time=' . date('YmdHis', strtotime($fromTime)) .
				'&to_time=' . date('YmdHis', strtotime($toTime));
		return $iqrf->createRequest($param);
	}

}
