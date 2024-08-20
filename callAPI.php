<?php

function CallAPI($method, $url, $isData = false) {
    $curl = curl_init();

    var_dump($method);
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($isData)
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($isData));
            break;
        case "PUT":
            
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($isData)
                $url = sprintf("%s?%s", $url, http_build_query($isData));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}
