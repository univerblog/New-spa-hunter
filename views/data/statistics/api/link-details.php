<?php
header('Content-Type: application/json');

$id = $_GET['id'] ?? '';
$type = $_GET['type'] ?? '';

if (!$id || !$type) {
    echo json_encode(['error' => 'Missing params']);
    exit;
}

$data = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/clicks_purchases.php';

if (!isset($data[$id][$type])) {
    echo json_encode(['error' => 'No data found']);
    exit;
}

$items = $data[$id][$type];
$total = count($items);
$perPage = 10;
$totalPages = ceil($total / $perPage);
$showPagination = $total > $perPage;

ob_start();

if ($type === 'clicks') {
?>
<h3>Clicks (<?= $total ?>)</h3>
<div class="m-c-item c-head for-3">
    <div>Date</div>
    <div>IP</div>
    <div>Country/City</div>
</div>
<div class="modal-scroll-content minus-margin fix-height">
    <div class="modal-click-table" id="modal-details-table">
        <?php foreach ($items as $item): ?>
        <div class="m-c-item for-3">
            <div class="date"><?= htmlspecialchars($item['date']) ?></div>
            <div class="ip"><?= htmlspecialchars($item['ip']) ?></div>
            <div class="local"><?= htmlspecialchars($item['location']) ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php if ($showPagination): ?>
<div class="mini-pagination" id="modal-pagination" style="margin-top:20px;">
</div>
<?php endif; ?>
<?php
} else {
    $totalSales = array_sum(array_column($items, 'purchase'));
    $totalEarned = array_sum(array_column($items, 'reward'));
?>
<h3>Purchases (<?= $total ?>)</h3>
<div class="total-modal">
    Sales:<span>$<?= number_format($totalSales, 2) ?></span>Your Earnings:<span>$<?= number_format($totalEarned, 2) ?></span>
</div>
<div class="m-c-item c-head for-4-3">
    <div>Buyer</div>
    <div class="for-mobile tab-filter">Sales &<br />Earned</div>
    <div class="for-desktop tab-filter">Sales</div>
    <div class="for-desktop tab-filter">Earned</div>
    <div>Status</div>
</div>
<div class="modal-scroll-content minus-margin fix-height">
    <div class="modal-click-table" id="modal-details-table">
        <?php foreach ($items as $item): ?>
        <div class="m-c-item for-4-3">
            <div class="buyer">
                <div class="date"><?= htmlspecialchars($item['date']) ?></div>
                <div class="ip"><span>IP</span><?= htmlspecialchars($item['ip']) ?></div>
                <div class="local"><?= htmlspecialchars($item['location']) ?></div>
            </div>
            <div class="for-mobile purchase-coll">
                $<?= $item['purchase'] ?><br />
                <span>$<?= $item['reward'] ?></span>
            </div>
            <div class="purchase for-desktop">
                $<?= $item['purchase'] ?>
            </div>
            <div class="reward for-desktop">
                $<?= $item['reward'] ?>
            </div>
            <div class="status">
                <span><?= htmlspecialchars($item['status']) ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php if ($showPagination): ?>
<div class="mini-pagination" id="modal-pagination" style="margin-top:20px;">
</div>
<?php endif; ?>
<?php
}

$html = ob_get_clean();
echo json_encode(['html' => $html]);