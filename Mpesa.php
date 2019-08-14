<?php
require 'config.php';

// create a base class that all other classes will extend from
abstract class Mpesa
{
    private $curl;
    private $body;
    private $token;

    abstract protected function generateBody();

    public function __construct()
    {
        $this->curl = curl_init();
        $this->authenticate();
    }

    private function authenticate()
    {   
        
        $credentials = base64_encode(CONSUMER_KEY . ':' . CONSUMER_SECRET);
        $this->curl = curl_init();

        curl_setopt_array($this->curl, array(
            CURLOPT_URL => ACCESS_TOKEN_URL,
            CURLOPT_HTTPHEADER => array('Authorization: Basic ' . $credentials),
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $curl_response = curl_exec($this->curl);
        $token_object = json_decode($curl_response); 
        $this->token = $token_object->access_token;
        curl_close($this->curl);
    }

    protected function execute($url)
    {   
        $this->curl = curl_init();
        $this->body = $this->generateBody();
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $this->token));

        $data_string = json_encode($this->body);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($this->curl);

        return $curl_response;
    }
}
