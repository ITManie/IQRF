# iqrf-cloud-nette

[![Build Status](https://travis-ci.org/Roman3349/iqrf-cloud-nette.svg?branch=master)](https://travis-ci.org/Roman3349/iqrf-cloud-nette)
[![Packagist](https://img.shields.io/packagist/dm/roman3349/iqrf-cloud-nette.svg)](https://packagist.org/packages/roman3349/iqrf-cloud-nette)
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
	userName: admin

php:
    date.timezone: Europe/Prague
    ...
```

More about DI container extensions you can find here: https://doc.nette.org/en/2.3/di-extensions
