<?php
header('Content-Type: application/json');

$key = $_GET['key'] ?? '';

if (empty($key)) {
    echo json_encode(['error' => 'No key provided']);
    exit;
}

$merchants = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/statistics/merchants.php';

if (!isset($merchants[$key])) {
    echo json_encode(['error' => 'Merchant not found']);
    exit;
}

$data = $merchants[$key];

$kpi = array_filter([
    'Средняя комиссия' => $data['avg_commission_rate'] ? $data['avg_commission_rate'] . '%' : null,
    'Средний чек' => $data['avg_basket_size'] ? '$' . number_format($data['avg_basket_size'], 2) : null,
    'Средняя конверсия в покупку' => $data['avg_conversion_rate'] ? $data['avg_conversion_rate'] . '%' : null,
    'Комиссия программы' => $data['commission'] ?: null,
]);

ob_start();
?>

<div class="merchant-wrapper">
    <h3><?= htmlspecialchars($data['name']) ?></h3>

    <?php if (!empty($data['countries'])): ?>
    <div class="merchant-item">
        <strong>Страны</strong>
        <div class="mer-open-block">
            <div class="mer-toggle" onclick="toggleMerchant(event)">
                Показать страны (<?= count($data['countries']) ?>)
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="mer-content">
                <p><?= htmlspecialchars(implode(', ', $data['countries'])) ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($data['categories'])): ?>
    <div class="merchant-item">
        <strong>Категории</strong>
        <div class="mer-content">
            <p><?= htmlspecialchars(implode(', ', $data['categories'])) ?></p>
         </div>
    </div>
    <?php endif; ?>

    <?php if ($kpi): ?>
    <div class="merchant-item">
        <strong>Показатели</strong>
        <div class="merchant-kpi">
            <?php foreach ($kpi as $label => $value): ?>
            <div class="merchant-kpi__tile">
                <small><?= $label ?></small>
                <b><?= htmlspecialchars($value) ?></b>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="modal-card">
        <h4>Что важно знать о комиссиях</h4>
        <ul class="ul-modal-list">
            <li>Финальная сумма комиссии может отличаться от заявленной – у каждого магазина свои правила по товарам.</li>
            <li>Использование подарочных карт или неавторизованных промокодов может привести к аннулированию комиссии.</li>
            <li>Отменённые, возвращённые или возмещённые заказы не учитываются при начислении.</li>
        </ul>
    </div>
        
</div>
<?php
$html = ob_get_clean();

echo json_encode(['html' => $html]);