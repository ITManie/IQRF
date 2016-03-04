<?php

namespace IQRF\Cloud\DI;

use Nette\DI\CompilerExtension,
	Nette\DI\Compiler,
	Nette\Configurator,
	Nette\Utils\Validators;

/**
 * IQRFExtension
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @package IQRF\Cloud\DI
 */

class IQRFExtension extends CompilerExtension {

	/**
	 * @var string Extension name
	 */
	const EXTENSION_NAME = 'iqrf';

	/** 
	 * @var array Default setting 
	 */
	private $defaults = ['apiKey' => null, 'userID' => null];

	/**
	 * @param string $apiKey API key
	 * @param int $userID USer ID
	 */
	public function __construct($apiKey = null, $userID = null) {
		$this->defaults['apiKey'] = $apiKey;
		$this->defaults['userID'] = $userID;
	}

	public function loadConfiguration() {
		$config = $this->getConfig($this->defaults);
		$builder = $this->getContainerBuilder();
		
		Validators::assert($config['apiKey'], 'string', 'API key');
		Validators::assert($config['userID'], 'string', 'User ID');

		$builder->addDefinition($this->prefix(self::EXTENSION_NAME))
				->setClass('IQRF\Cloud\IQRF', [$config['apiKey'], $config['userID']]);
	}

	/**
	 * @param Configurator $config
	 */
	public static function register(Configurator $config) {
		$config->onCompile[] = function (Configurator $configurator, Compiler $compiler) {
			$compiler->addExtension(self::EXTENSION_NAME, new IQRFExtension);
		};
	}

}
