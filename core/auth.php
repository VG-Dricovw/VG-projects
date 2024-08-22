<?php

class Auth
{



    public function __construct(private Jwt $JwtCtrl)
    {
    }



    public function authenticateJWTToken(): bool
    {

        if (!preg_match("/^Bearer\s+(.*)$/", $_SERVER["HTTP_AUTHORIZATION"], $matches)) {
            http_response_code(400);
            echo json_encode(["message" => "incomplete authorization header"]);
            return false;
        }

        try {
            $data = $this->JwtCtrl->decode($matches[1]);
        } catch (InvalidSignatureException) {

            http_response_code(401);
            echo json_encode(["message" => "invalid signature"]);
            return false;
        } catch (Exception $e) {

            http_response_code(400);
            echo json_encode(["message" => $e->getMessage()]);
            return false;
        }



        return true;
    }
}

// in index:
// $JwtCtrl = new Jwt($_ENV["SECRET_KEY"]);

// $auth = new Auth($user, $JwtCtrl);

// if (!$auth->authenticateJWTToken()) {
// exit;
// }