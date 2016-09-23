<?php

$permissions = [
    'notify', 
    'friends', 
    'photos', 
    'audio', 
    'video', 
    'docs',
    'notes', 
    'pages', 
    'status', 
    'wall', 
    'groups', 
    'messages', 
    'email',
    'notifications', 
    'stats', 
    'ads', 
    'market', 
    'offline'
];

$request_params = [
    'client_id' => '5640520',
    'redirect_uri' => 'https://oauth.vk.com/blank.html',
    'responce_type' => 'token',
    'display' => 'page',
    'scope' => implode(',', $permissions),
    'v' => '5.53'
];

$url = 'https://oauth.vk.com/authorize?'.http_build_query($request_params);

echo $url;

//2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f