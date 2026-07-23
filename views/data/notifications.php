<?php

return [

    // Категории: подпись + иконка
    'categories' => [
        'all'         => ['name' => 'Все',     'icon' => '<i class="fa-regular fa-inbox"></i>'],
        'balance'     => ['name' => 'Баланс',  'icon' => '<i class="fa-regular fa-wallet"></i>'],
        'links'       => ['name' => 'Ссылки',  'icon' => '<i class="fa-regular fa-link"></i>'],
        'account'     => ['name' => 'Аккаунт', 'icon' => '<i class="fa-regular fa-user"></i>'],
        'withdrawals' => ['name' => 'Выводы',  'icon' => '<i class="fa-regular fa-arrow-down-to-line"></i>'],
        'system'      => ['name' => 'Система', 'icon' => '<i class="fa-regular fa-gear"></i>'],
    ],

    // Группы по времени
    'periods' => [
        'today'     => 'Сегодня',
        'yesterday' => 'Вчера',
        'week'      => 'На этой неделе',
        'earlier'   => 'Ранее',
    ],

    // Уведомления (бэк заменит на выборку из БД)
    'rows' => [
        ['cat' => 'balance',     'period' => 'today',     'date' => 'Сегодня, 14:23',    'unread' => true,  'text' => 'Подтверждена комиссия $11.53 за заказ в Booking.com – деньги доступны к выводу.'],
        ['cat' => 'links',       'period' => 'today',     'date' => 'Сегодня, 11:40',    'unread' => false, 'text' => 'Создана короткая ссылка cpa.cx/a8f3 на товар в Nike. Готова к публикации.'],
        ['cat' => 'account',     'period' => 'today',     'date' => 'Сегодня, 09:12',    'unread' => true,  'text' => 'Источник трафика подтверждён: TikTok @sergeypav. Теперь можно создавать ссылки.'],
        ['cat' => 'balance',     'period' => 'today',     'date' => 'Сегодня, 07:05',    'unread' => false, 'text' => 'Начислена комиссия $4.20 за заказ в iHerb.'],

        ['cat' => 'withdrawals', 'period' => 'yesterday', 'date' => 'Вчера, 19:30',      'unread' => false, 'text' => 'Выплата $487.00 на USDT BEP-20 успешно обработана.'],
        ['cat' => 'links',       'period' => 'yesterday', 'date' => 'Вчера, 13:15',      'unread' => false, 'text' => 'Ссылка cpa.cx/k2m9 набрала 1 000 переходов.'],
        ['cat' => 'system',      'period' => 'yesterday', 'date' => 'Вчера, 09:50',      'unread' => false, 'text' => 'Обновлены условия программы Booking.com: ставка повышена.'],

        ['cat' => 'system',      'period' => 'week',      'date' => '2 дня назад',       'unread' => false, 'text' => 'Осталось $66 до уровня Silver. Бонус +14% ко всем партнёрским программам.'],
        ['cat' => 'account',     'period' => 'week',      'date' => '3 дня назад',       'unread' => false, 'text' => 'Источник трафика подтверждён: X.com @SecretDiscount_.'],
        ['cat' => 'balance',     'period' => 'week',      'date' => '4 дня назад',       'unread' => false, 'text' => 'Подтверждена комиссия $8.90 за заказ в Adidas.'],
        ['cat' => 'withdrawals', 'period' => 'week',      'date' => '5 дней назад',      'unread' => false, 'text' => 'Запрос на вывод $352.00 принят в обработку.'],
        ['cat' => 'links',       'period' => 'week',      'date' => '6 дней назад',      'unread' => false, 'text' => 'Создана короткая ссылка cpa.cx/p7r2 на товар в Sephora.'],

        ['cat' => 'balance',     'period' => 'earlier',   'date' => '28 ноября 2025',    'unread' => false, 'text' => 'Подтверждена комиссия $15.40 за заказ в Trip.com.'],
        ['cat' => 'account',     'period' => 'earlier',   'date' => '21 ноября 2025',    'unread' => false, 'text' => 'Источник трафика подтверждён: Instagram @peoplepro.'],
        ['cat' => 'withdrawals', 'period' => 'earlier',   'date' => '14 ноября 2025',    'unread' => false, 'text' => 'Выплата $395.00 на PayPal успешно обработана.'],
        ['cat' => 'system',      'period' => 'earlier',   'date' => '2 ноября 2025',     'unread' => false, 'text' => 'Добро пожаловать в CPA Hunter. Аккаунт создан.'],
    ],

];