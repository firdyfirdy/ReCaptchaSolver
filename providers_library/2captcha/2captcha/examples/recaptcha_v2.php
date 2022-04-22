<?php

set_time_limit(610);

require(__DIR__ . '/../src/autoloader.php');

$solver = new \TwoCaptcha\TwoCaptcha('c99a8fea35c1f8bb38670952e38d9bba');

try {
    $result = $solver->recaptcha([
        'sitekey' => '6Ldw9MQUAAAAAMObV4wrksZuXNbQsd0OEQ-ecqoQ',
        'url'     => 'https://loyalty.aldmic.com',
    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}

die('Captcha solved: ' . $result->code);
