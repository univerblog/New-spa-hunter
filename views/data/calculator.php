<?php

return [

    // platform: k — множитель кликов
    'platform' => [
        ['key' => 'yt',     'label' => 'YouTube',   'k' => 1.0],
        ['key' => 'ig',     'label' => 'Instagram', 'k' => 0.9],
        ['key' => 'tt',     'label' => 'TikTok',    'k' => 0.7],
        ['key' => 'x',      'label' => 'X',         'k' => 0.8],
        ['key' => 'tg',     'label' => 'Telegram',  'k' => 1.1],
        ['key' => 'twitch', 'label' => 'Twitch',    'k' => 0.85],
        ['key' => 'fb',     'label' => 'Facebook',  'k' => 0.75],
    ],

    // audience: clicks — кликов в месяц
    'audience' => [
        ['key' => 'micro',   'label' => '< 5K',        'clicks' => 800],
        ['key' => 'small',   'label' => '5K – 50K',    'clicks' => 3000],
        ['key' => 'medium',  'label' => '50K – 250K',  'clicks' => 12000],
        ['key' => 'large',   'label' => '250K – 500K', 'clicks' => 35000],
        ['key' => 'xlarge',  'label' => '500K – 1M',   'clicks' => 70000],
        ['key' => 'xxlarge', 'label' => '> 1M',        'clicks' => 150000],
    ],

    // niche: cr — конверсия %, order — средний чек $, comm — тариф %
    'niche' => [
        ['key' => 'auto',      'label' => 'Auto',               'cr' => 1.5, 'order' => 220, 'comm' => 4],
        ['key' => 'parenting', 'label' => 'Kids & parenting',   'cr' => 3.0, 'order' => 90,  'comm' => 6],
        ['key' => 'home',      'label' => 'Home & interior',    'cr' => 2.5, 'order' => 180, 'comm' => 6],
        ['key' => 'food',      'label' => 'Food & cooking',     'cr' => 3.0, 'order' => 60,  'comm' => 7],
        ['key' => 'health',    'label' => 'Health',             'cr' => 2.5, 'order' => 70,  'comm' => 12],
        ['key' => 'gaming',    'label' => 'Gaming',             'cr' => 2.0, 'order' => 50,  'comm' => 10],
        ['key' => 'beauty',    'label' => 'Beauty & cosmetics', 'cr' => 3.0, 'order' => 85,  'comm' => 8],
        ['key' => 'fashion',   'label' => 'Fashion',            'cr' => 2.5, 'order' => 95,  'comm' => 10],
        ['key' => 'education', 'label' => 'Education & courses', 'cr' => 2.0, 'order' => 120, 'comm' => 20],
        ['key' => 'pets',      'label' => 'Pets',               'cr' => 3.0, 'order' => 55,  'comm' => 10],
        ['key' => 'travel',    'label' => 'Travel',             'cr' => 1.5, 'order' => 300, 'comm' => 5],
        ['key' => 'lifestyle', 'label' => 'Lifestyle & vlogs',  'cr' => 2.0, 'order' => 70,  'comm' => 8],
        ['key' => 'tech',      'label' => 'Tech & gadgets',     'cr' => 1.5, 'order' => 350, 'comm' => 4],
        ['key' => 'finance',   'label' => 'Finance',            'cr' => 1.0, 'order' => 200, 'comm' => 25],
        ['key' => 'fitness',   'label' => 'Fitness',            'cr' => 2.5, 'order' => 80,  'comm' => 12],
        ['key' => 'hobby',     'label' => 'Hobby & crafts',     'cr' => 2.5, 'order' => 60,  'comm' => 8],
        ['key' => 'other',     'label' => 'Other',              'cr' => 2.0, 'order' => 80,  'comm' => 6],
    ],

    // region: mult — множитель дохода
    'region' => [
        ['key' => 'us',    'label' => 'US & Canada',      'mult' => 1.0],
        ['key' => 'eu',    'label' => 'Western Europe',   'mult' => 0.9],
        ['key' => 'eeu',   'label' => 'Eastern Europe',   'mult' => 0.5],
        ['key' => 'cis',   'label' => 'CIS',              'mult' => 0.4],
        ['key' => 'latam', 'label' => 'Latin America',    'mult' => 0.45],
        ['key' => 'sea',   'label' => 'Southeast Asia',   'mult' => 0.4],
        ['key' => 'mixed', 'label' => 'Mixed',            'mult' => 0.65],
    ],
];