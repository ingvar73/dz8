<?php
error_reporting(E_ALL);

$token = '2b1f1e925e33e21951d8bf466d767d1787e14b50eec99492185f227e0c686811d7e116e8cc48e8e2f220f';
        
        // ссылка для авторизации https://oauth.vk.com/authorize?client_id=5640520&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=notify,friends,photos,audio,video,docs,notes,pages,status,wall,groups,messages,email,notifications,stats,ads,market,offline&response_type=token&v=5.53
        // https://oauth.vk.com/access_token?client_id=5640520&client_secret=BVPineJfkrmQThukvHQ3&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=friends,wall,messages,groups&responce_type=token&v=5.53
        

        $userOptions = array(
            'user_ids' => 569999,
            'fields' => 'photo_id, verified, sex, bdate, city, country, home_town, has_photo, photo_50, photo_100, photo_200_orig, photo_200, photo_400_orig, photo_max, photo_max_orig, online, lists, domain, has_mobile, contacts, site'
        );
        
        $user = vkrequest('users.get', $userOptions, $token);
        echo $user;
        
        function vkrequest($method, $options = array(), $token = '')
        {
            $params = http_build_query($options);
            $url = 'https://api.vk.com/method/'.$method.'?'.$params.'&access_token='.$token.'&v=5.53';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_URL, $url);
            
            $responce = curl_exec($curl);
            curl_close($curl);
            return $responce;
        }