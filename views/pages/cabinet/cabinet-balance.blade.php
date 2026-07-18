@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Баланс</h1>
    <p>Состояние счёта и все транзакции.</p>
</div>

<!-- Блок отображения средств -->
<div class="cab-kpi-grid">
    <a href="" class="cab-kpi-card">
        <div class="cab-kpi-label">Доступно к&nbsp;выводу</div>
        <div class="cab-kpi-value lime">$24 234,50</div>
        <div class="cab-kpi-note">
            <div class="cab-link"><span>Вывести</span><i class="fa-regular fa-arrow-right fa-xs"></i></div>
        </div>
    </a>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">В&nbsp;ожидании</div>
        <div class="cab-kpi-value">$378,20</div>
        <div class="cab-kpi-note">Ждёт подтверждения брендов</div>
    </div>
    <div class="cab-kpi-card">
        <div class="cab-kpi-label">Всего заработано</div>
        <div class="cab-kpi-value">$1&nbsp;468,50</div>
        <div class="cab-kpi-note">За&nbsp;всё время</div>
    </div>
    <div class="cab-kpi-card empty">
        <div class="cab-kpi-label">Всего выведено</div>
        <div class="cab-kpi-value">$0,00</div>
        <div class="cab-kpi-note">Пока без&nbsp;выплат</div>
    </div>
</div>

<!-- Бонус на старт -->
<div class="bonus-card cab-card">
    <div class="bonus-card__row">
        <span>Бонус на старт</span>
        <b class="lime">$5 · залочен</b>
    </div>
    <div class="bonus-card__row">
        <span>До первой выплаты</span>
        <b>$15</b>
    </div>
    <div class="bonus-card__track">
        <div class="bonus-card__fill" style="width:25%"></div>
    </div>
    <a href="#" class="cab-link"><span>Проверка перед первой выплатой</span> <i class="fa-regular fa-arrow-right"></i></a>
</div> 

<!-- Последние выплаты -->
@include('components.cabinet.transactions', ['source' => 'balance', 'perPage' => 12])

@endsection

@push('scripts')


@endpush