<?php
////
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/bladeone/BladeOne.php';

use eftec\bladeone\BladeOne;

// доступ к константе внутри шаблонов
define('VIEWS_PATH', __DIR__ . '/views');

function inline_css($path) {
    $file = VIEWS_PATH . '/' . ltrim($path, '/');
    return file_exists($file) ? file_get_contents($file) : '';
}
////

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

$routes = [
    '' => 'pages.home',
];

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

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