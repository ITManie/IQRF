# iqrf-cloud-nette

[![Build Status](https://travis-ci.org/Roman3349/iqrf-cloud-nette.svg?branch=master)](https://travis-ci.org/Roman3349/iqrf-cloud-nette)
[![Packagist](https://img.shields.io/packagist/dm/roman3349/iqrf-cloud-nette.svg)](https://packagist.org/packages/roman3349/iqrf-cloud-nette)
[![Coverage Status](https://coveralls.io/repos/github/Roman3349/iqrf-cloud-nette/badge.svg?branch=master)](https://coveralls.io/github/Roman3349/iqrf-cloud-nette?branch=master)
[![HHVM Status](http://hhvm.h4cc.de/badge/roman3349/iqrf-cloud-nette.svg?style=flat)](http://hhvm.h4cc.de/package/roman3349/iqrf-cloud-nette)
[![Dependency Status](https://www.versioneye.com/user/projects/571f4d41fcd19a0039f180d1/badge.svg?style=flat)](https://www.versioneye.com/user/projects/571f4d41fcd19a0039f180d1)
[![Gitter](https://badges.gitter.im/Roman3349/iqrf-cloud-nette.svg)](https://gitter.im/Roman3349/iqrf-cloud-nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)
[![GPLv3](http://img.shields.io/badge/license-GPLv3-blue.svg)](LICENSE)

IQRF Cloud API wrapper for Nette Framework

## Installation

The best way how to install IQRF Cloud API wrapper is to use a Composer:

```
composer require roman3349/iqrf-cloud-nette
```

### Configuration

#### Using DI Extension (Nette 2.1+)

Add following lines into your `config.neon` file.

```yml
extensions:
	iqrf: IQRF\Cloud\DI\IQRFExtension

iqrf:
	apiKey: 'k6wuaem3wtaiupmnuc7cziuvaup2fxim'
	ipAddr: '127.0.0.1'
	userName: 'admin'

php:
    date.timezone: Europe/Prague
    ...
```

More about DI container extensions you can find here: https://doc.nette.org/en/2.3/di-extensions

## License
iqrf-cloud-nette is licensed under the GPLv3 license:

 > Copyright (C) 2016 Roman Ondráček
 >
 > This program is free software: you can redistribute it and/or modify
 > it under the terms of the GNU General Public License as published by
 > the Free Software Foundation, either version 3 of the License, or
 > (at your option) any later version.
 >
 > This program is distributed in the hope that it will be useful,
 > but WITHOUT ANY WARRANTY; without even the implied warranty of
 > MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 > GNU General Public License for more details.
 >
 > You should have received a copy of the GNU General Public License
 > along with this program.  If not, see <http://www.gnu.org/licenses/>.
