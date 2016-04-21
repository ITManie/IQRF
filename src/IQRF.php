<?php

namespace IQRF\Cloud;

use Nette\Object,
	Nette\Utils\Validators;

/**
 * IQRF
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class IQRF extends Object {

	/**
	 * @var string API URL
	 */
	const API_URI = 'https://cloud.iqrf.org/api/api.php?';

	/**
	 * @var string API version
	 */
	const API_VER = '2';

	/**
	 * @var string API key
	 */
	private $apiKey;

	/**
	 * @var string Server IPv4 address
	 */
	private $ipAddr;

	/**
	 * @var string User name
	 */
	private $userName;

	/**
	 * @param string $apiKey API key
	 * @param string $ipAddr Server IPv4 address
	 * @param str $userName User name
	 */
	public function __construct($apiKey, $ipAddr, $userName) {
		Validators::assert($apiKey, 'string', 'apiKey');
		Validators::assert($ipAddr, 'string', 'ipAddr');
		Validators::assert($userName, 'string', 'userName');

		$this->apiKey = $apiKey;
		$this->ipAddr = $ipAddr;
		$this->userName = $userName;
	}

	/**
	 * Get API key
	 * @return string API key
	 */
	public function getApiKey() {
		return $this->apiKey;
	}

	/**
	 * Get Server IPv4 address
	 * @return string Server IPv4 address
	 */
	public function getIpAddr() {
		return $this->ipAddr;
	}

	/**
	 * Get User name
	 * @return string User name
	 */
	public function getUserName() {
		return $this->userName;
	}

}
