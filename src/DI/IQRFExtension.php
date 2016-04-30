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

use Nette;
use Nette\Configurator;
use Nette\Utils\Validators;

/**
 * IQRFExtension
 * @author Roman Ondráček <ondracek.roman@centrum.cz>
 * @license https://gnu.org/licenses/gpl.html GPLv3
 * @version 1.0.0
 */
class IQRFExtension extends Nette\DI\CompilerExtension {

	/**
	 * @var string Extension name
	 */
	const EXTENSION_NAME = 'iqrf';

	/**
	 * @var array Default setting
	 */
	private $defaults = ['apiUrl' => 'https://cloud.iqrf.org/api/api.php',
		'apiKey' => null, 'ipAddr' => '127.0.0.1', 'userName' => 'admin'];

	/**
	 * @param string $apiUrl API URL
	 * @param string $apiKey API key
	 * @param string $ipAddr Server IPv4 address
	 * @param string $userName User name
	 */
	public function __construct($apiUrl = 'https://cloud.iqrf.org/api/api.php', $apiKey = null, $ipAddr = '127.0.0.1', $userName = 'admin') {
		$this->defaults['apiUrl'] = $apiUrl;
		$this->defaults['apiKey'] = $apiKey;
		$this->defaults['ipAddr'] = $ipAddr;
		$this->defaults['userName'] = $userName;
	}

	public function loadConfiguration() {
		$config = $this->getConfig($this->defaults);
		$builder = $this->getContainerBuilder();

		Validators::assert($config['apiUrl'], 'string', 'API URL');
		Validators::assert($config['apiKey'], 'string', 'API key');
		Validators::assert($config['ipAddr'], 'string', 'Server IPv4 address');
		Validators::assert($config['userName'], 'string', 'User name');

		$builder->addDefinition($this->prefix(self::EXTENSION_NAME))
				->setClass('IQRF\Cloud\Config', [$config['apiUrl'], $config['apiKey'], $config['ipAddr'], $config['userName']]);
	}

	/**
	 * @param Configurator $config
	 */
	public static function register(Configurator $config) {
		$config->onCompile[] = function (Configurator $configurator, Nette\DI\Compiler $compiler) {
			$compiler->addExtension(self::EXTENSION_NAME, new IQRFExtension);
		};
	}

}
