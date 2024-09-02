<?php

require "./engine/playload.php";

function buildQueryData($additionalData = []) {
    $defaultData = [
        'username' => 'ARDA',
        'password' => 'a057aefb0d0c57cb7322fed833977108',
        'cid' => '1702201907120002',
        'uid' => 'd01a1d296dc664bcb2d6230df238b3d6',
        'kd_user' => '8628bf6d636ae29a225d5d3bb42bfe34',
        'CID' => '1702201907120002'
    ];

    return http_build_query(array_merge($defaultData, $additionalData));
}

function sendRequest($endpoint, $data, $headers) {
    $response = sendRequest($endpoint, $data, $headers);
    $decodedResponse = json_decode($response);
    file_put_contents('debug_response.json', json_encode($decodedResponse, JSON_PRETTY_PRINT));
    return $decodedResponse;
}

$date_now = date('Y-m-d');
$date_1_day_ago = date('Y-m-d', strtotime('-300 day'));

$queryData = buildQueryData([
    'page' => 1,
    'key' => '',
    'filter' => 3,
    'fdt' => $date_now,
    'fdf' => $date_1_day_ago,
    'frux' => 0,
    'tfrux' => 'Ruangan',
    'modx' => 0
]);

$dataDaftarOrder = sendRequest("list_order.php", $queryData, $headers);
print_r($dataDaftarOrder);
