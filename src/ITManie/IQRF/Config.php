<?php

namespace ITManie\IQRF;

use Nette\Object,
    Nette\Utils\Validators;

class Config extends Object {

    /** @var string */
    private $apiKey;

    /** @var int */
    private $userID;

    /**
     * @param string $apiKey
     * @param int $userID
     */
    public function __construct($apiKey, $userID) {
        Validators::assert($apiKey, 'string', 'apiKey');
        Validators::assert($userID, 'int', 'userID');

        $this->apiKey = $apiKey;
        $this->userID = $userID;
    }

    /**
     * Get API key
     * @return string
     */
    public static function getApiKey() {
        return $this->apiKey;
    }

    /**
     * Get User ID
     * @return int
     */
    public static function getUserID() {
        return $this->userID;
    }

}
