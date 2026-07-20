<?php

return [

    // Категории: подпись + иконка (иконка рисуется в строке уведомления)
    'categories' => [
        'all'         => ['name' => 'Все',     'icon' => ''],
        'balance'     => ['name' => 'Баланс',  'icon' => '<i class="fa-regular fa-wallet"></i>'],
        'links'       => ['name' => 'Ссылки',  'icon' => '<i class="fa-regular fa-link"></i>'],
        'account'     => ['name' => 'Аккаунт', 'icon' => '<i class="fa-regular fa-user"></i>'],
        'withdrawals' => ['name' => 'Выводы',  'icon' => '<i class="fa-regular fa-arrow-down-to-line"></i>'],
        'system'      => ['name' => 'Система', 'icon' => '<i class="fa-regular fa-gear"></i>'],
    ],

    // Группы по времени
    'periods' => [
        'today'   => 'Сегодня',
        'week'    => 'На этой неделе',
        'earlier' => 'Ранее',
    ],

    // Уведомления (бэк заменит на выборку из БД)
    'rows' => [
        ['cat' => 'balance',     'period' => 'today',   'date' => 'Сегодня, 14:23',   'unread' => true,  'text' => 'Начислена комиссия $12.40 за заказ в Nike. Средства появятся в балансе после подтверждения магазином.'],
        ['cat' => 'links',       'period' => 'today',   'date' => 'Сегодня, 11:40',   'unread' => false, 'text' => 'Создана короткая ссылка cpa.cx/a8f3 на товар в Nike. Готова к публикации.'],
        ['cat' => 'account',     'period' => 'today',   'date' => 'Сегодня, 09:12',   'unread' => true,  'text' => 'Источник трафика подтверждён: TikTok @sergeypav. Теперь можно создавать ссылки.'],
        ['cat' => 'balance',     'period' => 'today',   'date' => 'Сегодня, 07:05',   'unread' => false, 'text' => 'Начислена комиссия $4.20 за заказ в iHerb.'],

        ['cat' => 'withdrawals', 'period' => 'week',    'date' => '18 июля, 16:30',   'unread' => true,  'text' => 'Заявка на вывод WD-50231 принята в обработку. Обычно занимает 1–3 рабочих дня.'],
        ['cat' => 'balance',     'period' => 'week',    'date' => '17 июля, 12:08',   'unread' => false, 'text' => 'Комиссия $8.90 за заказ в Booking.com подтверждена и доступна к выводу.'],
        ['cat' => 'links',       'period' => 'week',    'date' => '16 июля, 19:55',   'unread' => false, 'text' => 'Ссылка cpa.cx/k2m9 набрала 100 переходов за сутки.'],
        ['cat' => 'system',      'period' => 'week',    'date' => '15 июля, 10:00',   'unread' => false, 'text' => 'Добавлены три новые партнёрские программы в категории «Красота».'],

        ['cat' => 'withdrawals', 'period' => 'earlier', 'date' => '2 июля, 14:12',    'unread' => false, 'text' => 'Выплата WD-49842 на сумму $348.48 отправлена на USDT BEP-20.'],
        ['cat' => 'account',     'period' => 'earlier', 'date' => '28 июня, 09:30',   'unread' => false, 'text' => 'Уровень повышен до Silver. Ставки на всех программах увеличены на 14%.'],
        ['cat' => 'system',      'period' => 'earlier', 'date' => '20 июня, 11:45',   'unread' => false, 'text' => 'Обновлены условия партнёрской программы. Ознакомьтесь с изменениями в разделе «Документы».'],
        ['cat' => 'balance',     'period' => 'earlier', 'date' => '14 июня, 08:20',   'unread' => false, 'text' => 'Комиссия $2.10 за заказ в Sephora отменена: покупатель вернул товар.'],
    ],

];