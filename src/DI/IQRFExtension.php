<?php

namespace IQRF\Cloud\DI;

use Nette\DI\CompilerExtension,
	Nette\DI\Compiler,
	Nette\Configurator;

class IQRFExtension extends CompilerExtension {

	const EXTENSION_NAME = 'iqrf';

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
		$builder->addDefinition($this->prefix(self::EXTENSION_NAME))
				->setClass('IQRF\Cloud\Config', [$config['apiKey'], $config['userID']]);
	}

	/**
	 * @param Nette\Configurator $config
	 */
	public static function register(Configurator $config) {
		$config->onCompile[] = function ($config, Compiler $compiler) {
			$compiler->addExtension(self::EXTENSION_NAME, new IQRFExtension);
		};
	}

}
