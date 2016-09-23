<?php

$fields = ['connections', 'site', 'education', 'contacts', 'photo_max', 'status', 'city'];

$request_params = [
    'group_id' => 'podslushano_pestovo',
    'sort' => 'id_asc',
    'offset' => 0,
    'count' => 100,
    'fields' => implode(',', $fields),
    'access_token' => '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f'
];

$url = "https://api.vk.com/method/groups.getMembers?" . http_build_query($request_params);

$result = file_get_contents($url);

echo $result;

