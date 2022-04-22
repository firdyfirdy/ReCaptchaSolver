<?php
require_once 'providers/AntiCaptchaProviders.php';
require_once 'providers/DeathByCaptchaProviders.php';
require_once 'providers/TwoCaptchaProviders.php';

$site_key = '';
$login_url = '';

//$captcha = new DeathByCaptchaProviders('username', 'password');
$captcha = new AntiCaptchaProviders('example_access_token');
//$captcha = new TwoCaptchaProviders('example_access_token');
$captcha->setSiteKey($site_key)
        ->setSiteUrl($login_url)
        ->verify();
if ($captcha->isSuccess()){
    echo 'Response: ' . $captcha->getResponse() . PHP_EOL;
}else{
    echo 'Error: ' . $captcha->getErrorMessage() . PHP_EOL;
}