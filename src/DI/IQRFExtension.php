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
