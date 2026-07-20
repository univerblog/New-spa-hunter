@php
    $tax     = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/tax.php';
    $reports = $tax['reports'];
@endphp

<div class="cab-card">
    <div class="cab-card-head">
        <div class="cab-card-title">Годовые отчёты</div>
        <p class="cab-card-note">Справка о доходах за календарный год — для подготовки налоговой отчётности.</p>
    </div>

    @if (count($reports))
        <div class="tax-reports">
            <div class="tax-reports__head">
                <div>Год</div>
                <div>Заработано</div>
                <div>Выплачено</div>
                <div>Документ</div>
            </div>

            @foreach ($reports as $r)
                @php
                    $doc = [
                        'title' => 'Справка о доходах за ' . $r['year'] . ' год',
                        'sub'   => 'Fanzoone OÜ · registrikood 16537736 · Tallinn, Estonia',
                        'rows'  => [
                            ['Получатель', 'Сергей Павлович'],
                            ['Налоговый период', $r['year']],
                            ['Начислено вознаграждений', $r['earned']],
                            ['Выплачено', $r['paid']],
                        ],
                        'foot'  => 'Документ сформирован автоматически в личном кабинете cpahunter.io и используется для подготовки годовой налоговой отчётности.',
                    ];
                @endphp
                <div class="tax-reports__row">
                    <div class="tax-reports__year">{{ $r['year'] }}</div>
                    <div class="tax-reports__earned"><span>Заработано</span>{{ $r['earned'] }}</div>
                    <div class="tax-reports__paid"><span>Выплачено</span>{{ $r['paid'] }}</div>
                    <div class="tax-reports__doc">
                        <button data-doc="{{ json_encode($doc, JSON_UNESCAPED_UNICODE) }}"><i class="fa-regular fa-file-lines"></i>Скачать справку</button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="cab-tx-empty">
            <div class="cab-tx-empty-icon"><i class="fa-light fa-file-lines"></i></div>
            <div class="cab-tx-empty-title">Отчётов пока нет</div>
            <div class="cab-tx-empty-text">Справка появится после первого календарного года с выплатами.</div>
        </div>
    @endif
</div>