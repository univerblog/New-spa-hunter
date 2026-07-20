<?php

return [
// Карта статусов
    'statuses' => [
        'all'      => 'Все',
        'active'   => 'Приносит доход',
        'closed'   => 'Окно закрыто',
        'inactive' => 'Неактивен',
        'empty'    => 'Пусто',
    ],

    // Рефералы (бэк заменит на выборку из БД)
    'rows' => [
        ['name' => 'Maya R.',  'date' => '14 янв 2026', 'status' => 'active',   'income' => '$2 450.00', 'mine' => '$245.00', 'days' => 47],
        ['name' => 'Jamie T.', 'date' => '22 дек 2025', 'status' => 'active',   'income' => '$890.00',   'mine' => '$89.00',  'days' => 24],
        ['name' => 'Alex K.',  'date' => '30 ноя 2025', 'status' => 'inactive', 'income' => '$0.00',     'mine' => '$0.00',   'days' => null],
        ['name' => 'Elena P.', 'date' => '10 ноя 2025', 'status' => 'active',   'income' => '$1 120.00', 'mine' => '$112.00', 'days' => 12],
        ['name' => 'Denis M.', 'date' => '3 окт 2025',  'status' => 'closed',   'income' => '$640.00',   'mine' => '$64.00',  'days' => null],
        ['name' => 'Olga V.',  'date' => '18 сен 2025', 'status' => 'closed',   'income' => '$310.00',   'mine' => '$31.00',  'days' => null],
        ['name' => 'Ivan S.',  'date' => '2 сен 2025',  'status' => 'inactive', 'income' => '$0.00',     'mine' => '$0.00',   'days' => null],
        ['name' => 'Nina B.',  'date' => '25 авг 2025', 'status' => 'closed',   'income' => '$980.00',   'mine' => '$98.00',  'days' => null],
    ],

 ];   