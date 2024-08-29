<?php

use Firebase\JWT\Key;
use Firebase\JWT\JWT;




class handletoken
{
    public $key;
    public $date;
    public $expire_at;
    public $domainName;
    public $username;
    public $request_data = [];
    public $secret_key;


    public function __construct($key, $domain) {
        $this->secret_key = "$key";
        $this->date = new DateTimeImmutable();
        $this->expire_at = $this->date->modify('+6 minutes')->getTimestamp();
        $this->domainName = "$domain";
        $this->username = "drico";                                           // Retrieved from filtered POST data
        $request_data = [
            'iat' => $this->date->getTimestamp(),         // Issued at: time when the token was generated
            'iss' => $this->domainName,                       // Issuer
            'nbf' => $this->date->getTimestamp(),         // Not before
            'exp' => $this->expire_at,                           // Expire
            'userName' => $this->username,                     // User name
        ];
    }



    public function encode()
    {
        return JWT::encode(
            $this->request_data,
            $this->secret_key,
            'HS512'
        );


    }
}