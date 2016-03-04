<?php

use IQRF\Cloud\Utils,
	Tester\Assert;

require __DIR__ . '/bootstrap.php';

$utils = new Utils();

Assert::same('900ff48d8065da60a5b27f2434893e64', $utils->createSignature('ver=2&uid=test&gid=0d000001&cmd=uplc&data=616263', '12345678901234567890123456789012', '127.0.0.1', 1456758380));
