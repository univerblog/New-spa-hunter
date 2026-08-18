<?php
header('Content-Type: application/json');

$id = $_GET['id'] ?? '';
$type = $_GET['type'] ?? '';

if (!$id || !$type) {
    echo json_encode(['error' => 'Missing params']);
    exit;
}

$data = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/statistics/clicks_purchases.php';

if (!isset($data[$id][$type])) {
    echo json_encode(['error' => 'No data found']);
    exit;
}

$items = $data[$id][$type];
usort($items, fn($a, $b) => strcmp($b['date'], $a['date']));
$total = count($items);
$statuses = ['Pending' => ['В ожидании', ''], 'Approved' => ['Подтверждено', ' approved'], 'Denied' => ['Отклонено', ' denied']];

ob_start();

if ($type === 'clicks') {
?>
<h3>Клики (<?= $total ?>)</h3>

<div class="lined-table-box">
    <table class="lined-table table-clicks">
        <thead><tr><th>Дата</th><th>IP</th><th>Страна / Город</th></tr></thead>
        <tbody id="modal-details-table" data-per-page="10">
            <?php foreach ($items as $item): ?>
            <tr>
                <td data-sort="<?= $item['date'] ?>"><?= date('d.m.Y H:i', strtotime($item['date'])) ?></td>
                <td><?= htmlspecialchars($item['ip']) ?></td>
                <td><?= htmlspecialchars($item['location']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if ($total > 10): ?>
<div class="mini-pagination" id="modal-pagination"></div>
<?php endif; ?>
<?php
} else {
    $totalSales = array_sum(array_column($items, 'purchase'));
    $totalReward = array_sum(array_column($items, 'reward'));
?>
<h3>Покупки (<?= $total ?>)</h3>

<div class="lined-table-box">
    <table class="lined-table">
        <thead>
            <tr>
                <th><div class="tab-filter">Дата</div></th>
                <th><div class="tab-filter">Сумма <span>(USD)</span></div></th>
                <th><div class="tab-filter">Награда <span>(USD)</span></div></th>
                <th><div class="tab-filter">Статус</div></th>
            </tr>
        </thead>
        <tbody id="modal-details-table" data-per-page="8">
            <?php foreach ($items as $item): ?>
            <tr>
                <td data-sort="<?= $item['date'] ?>"><?= date('d.m.Y H:i', strtotime($item['date'])) ?><span class="sub"><?= htmlspecialchars($item['ip']) ?></span></td>
                <td><?= number_format($item['purchase'], 2) ?></td>
                <td class="reward-cell<?= $statuses[$item['status']][1] ?? '' ?>"><?= number_format($item['reward'], 2) ?></td>
                <td><span class="status-pill<?= $statuses[$item['status']][1] ?? '' ?>"><?= $statuses[$item['status']][0] ?? $item['status'] ?></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if ($total > 8): ?>
<div class="mini-pagination" id="modal-pagination"></div>
<?php endif; ?>
<?php
}

$html = ob_get_clean();
echo json_encode(['html' => $html]);