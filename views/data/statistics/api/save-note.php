<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'] ?? null;
$note = $input['note'] ?? '';

if (!$id) {
    echo json_encode(['success' => false, 'error' => 'No id']);
    exit;
}

$file = $_SERVER['DOCUMENT_ROOT'] . '/views/data/statistic.php';
$stata = include $file;

foreach ($stata as &$item) {
    if ($item['id'] == $id) {
        $item['note'] = $note;
        break;
    }
}
unset($item);

$content = "<?php\nreturn " . var_export($stata, true) . ";\n";
file_put_contents($file, $content);

echo json_encode(['success' => true]);