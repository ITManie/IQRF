<?php

/*
 * Copyright (C) 2016 Roman Ondráček
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

namespace IQRF\Cloud;

/**
 * Config
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class Validators {

	/**
	 * Validate IPv4 address
	 * @param string $string String to validation
	 * @throws \InvalidArgumentException Invalid IPv4 address
	 */
	public static function isIPv4Addr($string) {
		$flags = FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE;
		if (!filter_var($string, FILTER_VALIDATE_IP, $flags)) {
			throw new \InvalidArgumentException('Invalid IPv4 address');
		}
	}

	/**
	 * Validate IQRF GW ID
	 * @param string $string String to validation
	 * @throws \InvalidArgumentException Invalid GW ID
	 */
	public static function isGwId($string) {
		$key = '/^[A-Fa-f0-9]{8}/';
		if (!preg_match($key, $string)) {
			throw new \InvalidArgumentException('Invalid GW ID');
		}
	}

}
