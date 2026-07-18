<?php

return [

    'types' => [
        'bank'     => ['name' => 'Банковский перевод', 'icon' => '<i class="fa-regular fa-building-columns"></i>', 'branch' => 'bank',   'details' => 'bank_iban'],
        'paypal'   => ['name' => 'PayPal',             'icon' => '<i class="fa-brands fa-paypal"></i>',            'branch' => 'email',  'details' => 'email'],
        'skrill'   => ['name' => 'Skrill',             'icon' => '<i class="fa-regular fa-wallet"></i>',           'branch' => 'email',  'details' => 'email'],
        'neteller' => ['name' => 'Neteller',           'icon' => '<i class="fa-regular fa-wallet"></i>',           'branch' => 'email',  'details' => 'email'],
        'payoneer' => ['name' => 'Payoneer',           'icon' => '<i class="fa-regular fa-wallet"></i>',           'branch' => 'email',  'details' => 'email'],
        'crypto'   => ['name' => 'Крипто',             'icon' => '<i class="fa-regular fa-bitcoin-sign"></i>',           'branch' => 'crypto', 'details' => 'crypto_addr'],
    ],

    'statuses' => [
        'ok'      => ['label' => 'Подтверждён',       'class' => 'ok'],
        'pending' => ['label' => 'Ожидает модерации', 'class' => 'pending'],
    ],

    // старт: методы уже есть (демо). Пусто — [] 
    'methods' => [
        ['type' => 'paypal', 'name' => 'palka',        'currency' => 'USD',  'tax' => 'РФ – Физлицо', 'status' => 'ok'],
        ['type' => 'bank',   'name' => 'Основной банк', 'currency' => 'USD',  'tax' => 'РФ – Физлицо', 'status' => 'pending'],
        ['type' => 'crypto', 'name' => 'USDT кошелёк',  'currency' => 'USDT', 'tax' => 'РФ – Физлицо', 'status' => 'ok'],
    ],

];