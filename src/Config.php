<?php

namespace IQRF\Cloud;

use Nette\Object,
	Nette\Utils\Validators;

class Config extends Object {

	/** @var string */
	private $apiKey;

	/** @var int */
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
