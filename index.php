<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/bladeone/BladeOne.php';
require_once __DIR__ . '/core/Gettext.php';
use eftec\bladeone\BladeOne;

define('VIEWS_PATH', __DIR__ . '/views');

function inline_css($path) {
    $file = VIEWS_PATH . '/' . ltrim($path, '/');
    return file_exists($file) ? file_get_contents($file) : '';
}

// 1. СНАЧАЛА загружаем массив языков
$languages = include __DIR__ . '/views/data/languages.php';

// 2. Определяем дефолт и список поддерживаемых
$defaultLang = 'ru';
$supported   = array_diff(array_keys($languages), [$defaultLang]);

// 3. Парсим URL — определяем язык
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = $uri === '' ? [] : explode('/', $uri);

if (isset($segments[0]) && in_array($segments[0], $supported, true)) {
    $lang = array_shift($segments);
} else {
    $lang = $defaultLang;
}

$uri = implode('/', $segments);

// =====================================================
//  GETTEXT (custom .po parser)
// =====================================================
$gettext = new Gettext();
$gettext->loadPoFile(__DIR__ . "/locale/$lang/messages.po");

$GLOBALS['gettext'] = $gettext;

if (!function_exists('__')) {
    function __(string $msgid): string {
        return $GLOBALS['gettext']->translate($msgid);
    }
}

// =====================================================
//  BLADE
// =====================================================
$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

// 6. Шарим в шаблоны
$blade->share('lang', $lang);
$blade->share('route', '/' . $uri);
$blade->share('languages', $languages);
$blade->share('current', $languages[$lang] ?? $languages[$defaultLang]);

// AJAX-фрагменты: рендерим ТОЛЬКО компонент транзакций, без страницы и лейаута
$fragment = $_SERVER['HTTP_X_FRAGMENT'] ?? '';
if ($fragment !== '') {
    $fragments = [
        'transactions' => 'components.cabinet.transactions',
        'sources' => 'components.cabinet.sources',
        'payout-methods'  => 'components.cabinet.payout-methods',
        'payouts'      => 'components.cabinet.payouts',
        'tax-profiles' => 'components.cabinet.tax-profiles',
        'referrals' => 'components.cabinet.referrals-table',
        'notifications' => 'components.cabinet.notifications',
    ];
    if (isset($fragments[$fragment])) {
        echo $blade->run($fragments[$fragment], ['source' => $_GET['source'] ?? 'default']);
    } else {
        http_response_code(404);
    }
    exit;
}
//////////////////////////////////////////// 

$routes = [
    '' => 'pages.home',
    'faq-page' => 'pages.faq-page',
    'program-page' => 'pages.program-page',
    'platform-page' => 'pages.platform-page',
    'roadmap' => 'pages.roadmap',
    'contacts' => 'pages.contacts',
    
    'ai-facts-page' => 'pages.legal.ai-facts-page',
    'terms' => 'pages.legal.terms', // Условия использования
    'privacy' => 'pages.legal.privacy', // Политика конфиденциальности
    'compliance' => 'pages.legal.compliance', // Правила и проверка
    'dnss' => 'pages.legal.dnss', // Не продавать мои данные
    'cookie' => 'pages.legal.cookie', // Политика cookies
    'cookie-settings' => 'pages.legal.cookie-settings', // Настройки cookie

    'cabinet' => 'pages.cabinet.cabinet-start',
    'cabinet-start' => 'pages.cabinet.cabinet-quick-start',
    'cabinet/statistics' => 'pages.cabinet.cabinet-statistics', // Статистика
    'cabinet/balance' => 'pages.cabinet.cabinet-balance', // Баланс
    'cabinet/level' => 'pages.cabinet.cabinet-level', // Мой уровень
    'cabinet/notifications' => 'pages.cabinet.cabinet-notifications', // Уведомления
    'cabinet/referrals' => 'pages.cabinet.cabinet-referrals', // Реферальная программа
    'cabinet/settings' => 'pages.cabinet.cabinet-settings', // Настройки
    'cabinet/sources' => 'pages.cabinet.cabinet-sources', // Источники трафика
    'cabinet/support' => 'pages.cabinet.cabinet-support', // Поддержка
    'cabinet/tax' => 'pages.cabinet.cabinet-tax', // Налоговая информация
    'cabinet/withdraw' => 'pages.cabinet.cabinet-withdraw', // Вывод средств
];

try {

    if (array_key_exists($uri, $routes)) {

        echo $blade->run(
            $routes[$uri],
            ['title' => ucfirst($uri) ?: 'Главная']
        );

    } else {

        http_response_code(404);

        echo $blade->run(
            'pages.404',
            ['title' => 'Страница не найдена']
        );
    }

} catch (Throwable $e) {

    echo '<pre>';
    echo 'Ошибка: ' . $e->getMessage() . "\n\n";
    echo 'Файл: ' . $e->getFile() . "\n";
    echo 'Строка: ' . $e->getLine() . "\n\n";
    echo $e->getTraceAsString();
    echo '</pre>';
}