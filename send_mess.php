<?php

$request_params = [
    'user_id' => 569999,
    'random_id' => mt_rand(20, 99999999),
    'peer_id' => 19091623,
    'domain' => '',
    'chat_id' => 36,
    'message' => 'Тестовое сообщение из API',
    'v' => '5.53',
    'access_token' => '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f'
];

$url = "https://api.vk.com/method/messages.send?" . http_build_query($request_params);

file_get_contents($url);
