<?php

function sendRequest($url, $data = null, $headers = array(), $method = 'POST') {
    global $base_url;
    $url = $base_url.$url;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    if (strtoupper($method) === 'POST') {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } else if (strtoupper($method) === 'GET') {
        curl_setopt($curl, CURLOPT_HTTPGET, true);
    }

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}
