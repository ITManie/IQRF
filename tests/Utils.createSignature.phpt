<?php

use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();

Assert::same('d03fb02a068744811911f5a5fa7dcd6f', $utils->createSignature('ver=2&uid=123&gid=0d000001&cmd=uplc&data=616263', '12345678901234567890123456789012', '127.0.0.1', 1456758380));
