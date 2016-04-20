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
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class IQRFExtension extends CompilerExtension {

	/**
	 * @var string Extension name
	 */
	const EXTENSION_NAME = 'iqrf';

	/**
	 * @var array Default setting
	 */
	private $defaults = ['apiKey' => null, 'ipAddr' => '127.0.0.1', 'userName' => 'admin'];

	/**
	 * @param string $apiKey API key
	 * @param string $ipAddr Server IPv4 address
	 * @param string $userName User name
	 */
	public function __construct($apiKey = null, $ipAddr = '127.0.0.1', $userName = 'admin') {
		$this->defaults['apiKey'] = $apiKey;
		$this->defaults['ipAddr'] = $ipAddr;
		$this->defaults['userName'] = $userName;
	}

	public function loadConfiguration() {
		$config = $this->getConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		Validators::assert($config['apiKey'], 'string', 'API key');
		Validators::assert($config['ipAddr'], 'string', 'Server IPv4 address');
		Validators::assert($config['userName'], 'string', 'User name');

		$builder->addDefinition($this->prefix(self::EXTENSION_NAME))
				->setClass('IQRF\Cloud\IQRF', [$config['apiKey'], $config['ipAddr'], $config['userName']]);
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
