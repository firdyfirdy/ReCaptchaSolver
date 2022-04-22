<?php

use Captcha\Captcha;

require_once 'core/Captcha.php';
require_once 'providers_library/dbc/dbc.php';

class DeathByCaptchaProviders extends Captcha
{
    private string $username = "";
    private string $password = "";

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function verify()
    {
        try {
            $client = new DeathByCaptcha_HttpClient($this->username, $this->password);
            $data = array('googlekey' => $this->site_key, 'pageurl' => $this->site_url);
            $json = json_encode($data);
            $extra = ['type' => 4, 'token_params' => $json];
            $captcha = $client->decode(null, $extra);
            if ($captcha['text'] == null){
                $this->error_message = 'Cannot solved captcha!';
            }else{
                $this->is_success = true;
                $this->response = $captcha['text'];
            }
        } catch (Exception $e) {
            $this->error_message = $e->getMessage();
        }
    }
}