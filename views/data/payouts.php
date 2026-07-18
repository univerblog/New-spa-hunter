<?php

return [

    // Карта статусов: ключ => подпись
    'statuses' => [
        'all'       => 'Все',
        'pending'   => 'В ожидании',
        'paid'      => 'Выплачено',
        'cancelled' => 'Отменено',
        'empty'     => 'Пусто',
    ],

    // Строки истории выплат (бэк заменит на выборку из БД)
    'rows' => [
        ['id' => 'WD-50231', 'date' => '15 дек 2025', 'method' => 'USDT BEP-20', 'amount' => '$487.00', 'fee' => '$4.87', 'receive' => '$482.13', 'status' => 'pending',   'comment' => 'Выплата в обработке у платёжной системы. Обычно занимает 1–3 рабочих дня.'],
        ['id' => 'WD-49842', 'date' => '1 дек 2025',  'method' => 'USDT BEP-20', 'amount' => '$352.00', 'fee' => '$3.52', 'receive' => '$348.48', 'status' => 'paid',      'comment' => ''],
        ['id' => 'WD-49103', 'date' => '18 ноя 2025', 'method' => 'PayPal',      'amount' => '$200.00', 'fee' => '—',     'receive' => '—',       'status' => 'cancelled', 'comment' => 'Отменено: реквизиты не прошли проверку. <a href="/cabinet/withdraw">Проверьте данные метода</a> и создайте заявку заново.',],
        ['id' => 'WD-47615', 'date' => '14 окт 2025', 'method' => 'PayPal',      'amount' => '$395.00', 'fee' => '$7.90', 'receive' => '$387.10', 'status' => 'paid',      'comment' => ''],
        ['id' => 'WD-46201', 'date' => '2 окт 2025',  'method' => 'USDT BEP-20', 'amount' => '$510.00', 'fee' => '$5.10', 'receive' => '$504.90', 'status' => 'paid',      'comment' => ''],
        ['id' => 'WD-45118', 'date' => '19 сен 2025', 'method' => 'PayPal',      'amount' => '$180.00', 'fee' => '$3.60', 'receive' => '$176.40', 'status' => 'paid',      'comment' => ''],
        ['id' => 'WD-44002', 'date' => '5 сен 2025',  'method' => 'USDT BEP-20', 'amount' => '$620.00', 'fee' => '$6.20', 'receive' => '$613.80', 'status' => 'paid',      'comment' => ''],
    ],

];