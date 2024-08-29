<?php


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";
use App\Core\User;
use Firebase\JWT\JWT;
require_once('../../../vendor/autoload.php');

// get users
//get login data
//compare and verify
//make a token
//send the token back


//get users:
$user = new user($db);
$users = $user->read();
$num = $users->rowCount();


//get logindata
$data = json_decode(file_get_contents("php://input"));

$login_email = $data->email;
$login_password = $data->password;

// var_dump($row = $users->fetch(PDO::FETCH_ASSOC));

$name = substr($data->email, 0, strpos($data->email, "@"));
$secret_key = "$name";
$date = new DateTimeImmutable();
$expire_at = $date->modify('+1 day')->getTimestamp();
$domainName = "localhost";
$username = "$name";                                           // Retrieved from filtered POST data
$request_data = [
  'iat' => $date->getTimestamp(),         // Issued at: time when the token was generated
  'iss' => $domainName,                       // Issuer
  'nbf' => $date->getTimestamp(),         // Not before
  'exp' => $expire_at,                           // Expire
  'username' => $username,                     // User name
];



    

if ($num > 0) {
    $user_arr = array();
    while ($row = $users->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            'id' => $id,
            "email" => $email,
            "password" => $password,
        );
        // var_dump( $user_item );
        // var_dump($login_email);
        // compare and verify
        if ($user_item["email"] == $login_email && $user_item['password'] == $login_password) {
            //make the token
            $jwttoken = JWT::encode(
                $request_data,
                $secret_key,
                'HS512'
            );
            //send the token back
            echo json_encode(array('message' => "login succesful", "token" => $jwttoken, "length" => strlen($jwttoken)));
            break;
        }
    }
    echo json_encode(array("message"=> "user not found in db"));
} else {
    echo json_encode(array('message '=> 'no users found'));
}