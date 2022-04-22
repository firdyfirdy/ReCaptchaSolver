<?php

namespace Captcha;

require_once 'ICaptcha.php';

use ICaptcha;

class Captcha implements ICaptcha
{
    protected string $site_key = "";
    protected string $site_url = "";
    protected string $error_message = "";
    protected string $response = "";
    protected bool $is_success = false;


    public function verify()
    {

    }

    public function setSiteKey(string $site_key): Captcha
    {
        if ($site_key == ''){
            $this->error_message = 'Site key cannot be empty!';
        }else{
            $this->site_key = $site_key;
        }
        return $this;
    }

    public function setSiteUrl(string $site_url): Captcha
    {
        if ($site_url == ''){
            $this->error_message = 'Site URL cannot be empty!';
        }else{
            $this->site_url = $site_url;
        }
        return $this;
    }

    public function isSuccess(): bool
    {
        return $this->is_success;
    }

    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}