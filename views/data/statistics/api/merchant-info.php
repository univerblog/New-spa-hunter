<?php
header('Content-Type: application/json');

$key = $_GET['key'] ?? '';

if (empty($key)) {
    echo json_encode(['error' => 'No key provided']);
    exit;
}

$merchants = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/merchants.php';

if (!isset($merchants[$key])) {
    echo json_encode(['error' => 'Merchant not found']);
    exit;
}

$data = $merchants[$key];

// Формируем HTML на сервере
ob_start();
?>

<div class="merchant-wrapper">
    <h3><?= htmlspecialchars($data['name']) ?></h3>
    <div class="modal-scroll-content">
        <?php if (!empty($data['countries'])): ?>
        <div class="merchant-item">
            <strong>Countries:</strong>
            <div class="mer-open-block">
                <div class="mer-toggle" onclick="toggleMerchant(event)">
                    Show Countries <?= count($data['countries']) ?>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="mer-content">
                    <p><?= htmlspecialchars(implode(', ', $data['countries'])) ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>


        
        <?php if (!empty($data['categories'])): ?>
        <div class="merchant-item">
            <strong>Categories:</strong> <?= htmlspecialchars(implode(', ', $data['categories'])) ?>
        </div>
        <?php endif; ?>


        
        <?php if (!empty($data['avg_commission_rate'])): ?>
        <div class="merchant-item">
            <strong>Avg. Commission Rate:</strong> <?= $data['avg_commission_rate'] ?>%
        </div>
        <?php endif; ?>
        


        <?php if (!empty($data['avg_basket_size'])): ?>
        <div class="merchant-item">
            <strong>Avg. Basket Size:</strong> $<?= $data['avg_basket_size'] ?>
        </div>
        <?php endif; ?>


        
        <?php if (!empty($data['avg_conversion_rate'])): ?>
        <div class="merchant-item">
            <strong>Avg. Conversion Rate:</strong> <?= $data['avg_conversion_rate'] ?>%
        </div>
        <?php endif; ?>


        
        <?php if (!empty($data['commission'])): ?>
        <div class="merchant-item">
            <strong>Commission:</strong> <?= htmlspecialchars($data['commission']) ?>
        </div>
        <?php endif; ?>


        
        <?php if (!empty($data['offers'])): ?>
        <div class="merchant-item">
            <strong>Offers:</strong>
            <?php foreach ($data['offers'] as $region => $offers): ?>

            <div class="mer-open-block">
                <div class="mer-toggle" onclick="toggleMerchant(event)">
                    <?= htmlspecialchars($region) ?>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="mer-content">
                    <ul>
                    <?php foreach ($offers as $offer): ?>
                      <li>Rate: <?= $offer['rate'].'%' ?? '-' ?> (<?= htmlspecialchars($offer['description'] ?? '') ?>)</li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>

             <?php endforeach; ?>
        </div>    
        <?php endif; ?>



        
        <div class="merchant-disclaimer">
            <strong>Commission Disclaimer</strong>
            <ol class="disclaimer-list">
                <li>The final commission amount may vary based on the items purchased, as each brand may have its own policies.</li>
                <li>Using gift cards or unauthorized promo codes may result in ineligible commissions. Rules can vary by brand.</li>
                <li>Orders that are canceled, returned, or refunded may not qualify for commission earnings.</li>
            </ol>
        </div>
    </div>    
</div>
<?php
$html = ob_get_clean();

echo json_encode(['html' => $html]);
