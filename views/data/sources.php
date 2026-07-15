<?php

return [

    // Карта платформ: ключ => название + <i> + способ подключения + домен
   'platforms' => [
        'youtube'   => ['name' => 'YouTube',   'icon' => '<i class="fa-brands fa-youtube"></i>',   'connect' => 'oauth', 'domain' => 'youtube.com/@',  'result' => 'active'],
        'instagram' => ['name' => 'Instagram', 'icon' => '<i class="fa-brands fa-instagram"></i>', 'connect' => 'input', 'domain' => 'instagram.com/', 'result' => 'review'],
        'tiktok'    => ['name' => 'TikTok',    'icon' => '<i class="fa-brands fa-tiktok"></i>',    'connect' => 'oauth', 'domain' => 'tiktok.com/@',   'result' => 'blocked'],
        'twitch'    => ['name' => 'Twitch',    'icon' => '<i class="fa-brands fa-twitch"></i>',    'connect' => 'oauth', 'domain' => 'twitch.tv/',     'result' => 'review'],
        'x'         => ['name' => 'X.com',     'icon' => '<i class="fa-brands fa-x-twitter"></i>', 'connect' => 'oauth', 'domain' => 'x.com/',         'result' => 'review'],
        'facebook'  => ['name' => 'Facebook',  'icon' => '<i class="fa-brands fa-facebook"></i>',  'connect' => 'oauth', 'domain' => 'facebook.com/',  'result' => 'review'],
        'telegram'  => ['name' => 'Telegram',  'icon' => '<i class="fa-brands fa-telegram"></i>',  'connect' => 'input', 'domain' => 't.me/',          'result' => 'review'],
    ],

    // Карта статусов: ключ => подпись бейджа + css-класс (active без бейджа)
    'statuses' => [
        'active'   => ['label' => 'Активен',      'class' => 'active'],
        'review'   => ['label' => 'На проверке',  'class' => 'review'],
        'blocked'  => ['label' => 'Заблокирован', 'class' => 'blocked'],
    ],

    // Подключённые источники: сервис-ключ, адрес, статус
    'connected' => [],

];