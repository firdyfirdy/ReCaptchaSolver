<?php

use Captcha\Captcha;
use TwoCaptcha\TwoCaptcha;

require_once 'core/Captcha.php';
require_once 'providers_library/2captcha/2captcha/src/autoloader.php';
require_once 'providers_library/2captcha/2captcha/src/TwoCaptcha.php';

class TwoCaptchaProviders extends Captcha
{
    private string $access_token = "";

    public function __construct(string $access_token)
    {
        $this->access_token = $access_token;
    }

    public function verify()
    {
        $solver = new TwoCaptcha($this->access_token);

        try {
            $result = $solver->recaptcha([
                'sitekey' => $this->site_key,
                'url'     => $this->site_url,
            ]);
            $this->is_success = true;
            $this->response = $result->code;
        } catch (Exception $e) {
            $this->error_message = $e->getMessage();
        }
    }
}