<?php

return [

    // Карта типов лица: подпись + иконка + подпись поля имени
    'types' => [
        'individual' => ['name' => 'Физлицо', 'icon' => '<i class="fa-regular fa-user"></i>',      'name_label' => 'ФИО'],
        'entity'     => ['name' => 'Юрлицо',  'icon' => '<i class="fa-regular fa-building"></i>',  'name_label' => 'Название компании'],
    ],

    // Страны налогового резидентства (для селекта)
    'countries' => [
        'ru' => 'Российская Федерация',
        'us' => 'США',
        'de' => 'Германия',
        'gb' => 'Великобритания',
        'ee' => 'Эстония',
    ],

    // Карта статусов
    'statuses' => [
        'ok'      => ['label' => 'Подтверждён',  'class' => 'ok'],
        'pending' => ['label' => 'На модерации', 'class' => 'pending'],
    ],

    // Профили пользователя (бэк заменит на выборку из БД)
    'profiles' => [
        [
            'country' => 'ru',
            'type'    => 'individual',
            'name'    => 'Сергей Петров',
            'city'    => 'Москва',
            'address' => 'ул. Тверская, 1',
            'zip'     => '125009',
            'taxnum'  => '771234567890',
            'status'  => 'ok',
            'default' => true,
        ],
    ],
    

    // Годовые отчёты
    'reports' => [
        ['year' => '2025', 'earned' => '$981.38', 'paid' => '$747.00'],
        ['year' => '2024', 'earned' => '$487.12', 'paid' => '$487.00'],
    ],

];