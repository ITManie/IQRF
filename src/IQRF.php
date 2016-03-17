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
	 * @var string
	 */
	const API_URI = 'https://cloud.iqrf.org/api/api.php?';

	/**
	 * @var string
	 */
	const API_VER = '2';

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var int
	 */
	private $userID;

	/**
	 * @param string $apiKey API key
	 * @param int $userID User ID
	 */
	public function __construct($apiKey, $userID) {
		Validators::assert($apiKey, 'string', 'apiKey');
		Validators::assert($userID, 'int', 'userID');

		$this->apiKey = $apiKey;
		$this->userID = $userID;
	}

	/**
	 * Get API key
	 * @return string API key
	 */
	public function getApiKey() {
		return $this->apiKey;
	}

	/**
	 * Get User ID
	 * @return int User ID
	 */
	public function getUserID() {
		return $this->userID;
	}

}
