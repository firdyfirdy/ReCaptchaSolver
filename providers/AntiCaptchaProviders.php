<?php

use Captcha\Captcha;

require_once 'core/Captcha.php';
require_once 'providers_library/anticaptcha/anticaptcha.php';
require_once 'providers_library/anticaptcha/nocaptchaproxyless.php';

class AntiCaptchaProviders extends Captcha
{
    private string $access_token = "";

    public function __construct(string $access_token)
    {
        $this->access_token = $access_token;
    }

    public function verify()
    {
        $api = new NoCaptchaProxyless();
        $api->setVerboseMode(false);
        $api->setKey($this->access_token);
        $api->setWebsiteURL($this->site_url);
        $api->setWebsiteKey($this->site_key);
        if (!$api->createTask()) {
            $this->error_message = $api->getErrorMessage();
        }
        if (!$api->waitForResult(300)) {
            $this->error_message = $api->getErrorMessage();
        } else {
            $this->is_success = true;
            $this->response = $api->getTaskSolution();
        }
    }
}