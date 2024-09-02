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
    $data = sendPostRequest($endpoint, $data, $headers);
    $decodedData = json_decode($data);
    return $decodedData;
}

$data_order = buildQueryData(['cari' => '', 'status' => '2']);
$data_notif = buildQueryData(['cnk' => 1]);

$rsp_data = sendRequest("listo_has.php", $data_order, $headers);
// $rsp_notif = sendRequest("notif.php", $data_notif, $headers);

foreach ($rsp_data as $lis_data) {
    $req_hasil = buildQueryData(['noo' => $lis_data->no_order]);
    $rsp_hasil = sendRequest("dataHasil.php", $req_hasil, $headers);
    print_r($rsp_hasil);
}
