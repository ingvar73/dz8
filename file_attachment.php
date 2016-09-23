<?php
// etap #1 получаем адрес сервера для загрузки
$dir_name = str_replace('\\', '/', dirname(__FILE__));
define ('ROOT', $dir_name);

error_reporting(-1);

$request_params = [
  'access_token' => '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f',
  'v' => '5.53'
];

$url = "https://api.vk.com/method/photos.getMessagesUploadServer?" . http_build_query($request_params);

$result = json_decode(file_get_contents($url), true);

// этап 2 загружаем картинку


$curl = curl_init();
$file = ROOT.'/cover.jpg';

$file = curl_file_create($file, mime_content_type($file), pathinfo($file)['basename']);

$server = $result['response']['upload_url'];
$params = array('file' => $file);


curl_setopt($curl, CURLOPT_URL, $server);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data;charset=utf-8'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

$curl_s = curl_exec($curl);

$response_image = json_decode($curl_s, 1);

//var_dump(curl_error($curl));

curl_close($curl);


// сохраняем картинку
$request_params = [
    'server' => $response_image['server'],
    'photo' => $response_image['photo'],
    'hash' => $response_image['hash'],
    'access_token' => '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f',
    'v' => '5.53'
];

$url = "https://api.vk.com/method/photos.saveMessagesPhoto?" . http_build_query($request_params);
$result_image = json_decode(file_get_contents($url), true);

$request_params = [
    'user_id' => 569999,
    'random_id' => mt_rand(20, 99999999),
    'peer_id' => 19091623,
    'domain' => 'www.block-modul.ru',
    'chat_id' => 36,
    'attachment' => 'photo'.$result_image['response'][0]['owner_id'].'_'.$result_image['response'][0]['id'],
    'message' => 'Проект деревянного дома',
    'v' => '5.53',
    'access_token' => '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f'
];

$url = "https://api.vk.com/method/messages.send?" . http_build_query($request_params);

file_get_contents($url);