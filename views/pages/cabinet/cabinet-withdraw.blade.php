@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Вывод средств</h1>
    <p>Первая выплата – от $20, далее от $50. Бонус $5 выводится в составе первой выплаты. Обработка 1-3 рабочих дня.</p>
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
<!-- Включите двухфакторную аутентификацию -->
<div class="tfa-note cab-card">
    <div class="tfa-note__cont">
        <i class="fa-solid fa-shield-halved"></i>
         <div class="tfa-note__cont__txt">
            <strong>Включите двухфакторную аутентификацию</strong>
            <small>Дополнительный уровень защиты: доступ к аккаунту получите только вы, даже если пароль узнают посторонние. Двухфакторная аутентификация обязательна для добавления платёжных реквизитов.</small>
        </div>
    </div>
   
    <a href="#" class="btn min outline">Включить</a>
</div>
<!-- Вывести на метод -->
<div class="cab-card wd-block" data-wd-available="22450.20">
        <div class="wd-block__fields">
            <div class="cab-card-head">
                <div class="cab-card-title">Вывести на метод</div>
            </div>

            <div class="select" data-select data-wd-method>
                <button type="button" class="select-trigger">
                    <span class="select-value">PayPal · palka · USD</span>
                    <i class="fa-solid fa-chevron-down select-arrow"></i>
                </button>
                <div class="select-panel">
                    <div class="select-list">
                        <button type="button" class="select-option is-selected" data-value="paypal" data-fee="2">PayPal · palka · USD</button>
                        <button type="button" class="select-option" data-value="crypto" data-fee="1">Крипто · USDT кошелёк · USDT</button>
                    </div>
                </div>
            </div>

            <div class="cab-card-title wd-label">Введите сумму</div>
            <div class="wd-amount">
                <span class="wd-amount__prefix">$</span>
                <input type="text" inputmode="decimal" data-wd-amount placeholder="" value="">
                <button type="button" class="cab-link" data-wd-all><span>Вывести все</span></button>
            </div>

            <div class="wd-calc">
                <div data-wd-fee>Комиссия 2%: <span>$0.00</span></div>
                <div data-wd-receive>К получению: <span>$0.00</span></div>
            </div>
            <div class="btn-group">
                <button class="btn outline" data-wd-clear>Очистить</button>
                <button class="btn" data-wd-submit>Запросить вывод</button>
            </div>
        </div>
        <div class="wd-block__aside">
            <div class="cab-card-title">Доступно к&nbsp;выводу</div>
            <div class="wd-available">$22 450.20</div>
        </div>
</div>

@include('components.cabinet.payout-methods')

@include('components.cabinet.payouts')

@endsection

@push('scripts')
<script>
(function(){
    var block = document.querySelector('.wd-block');
    if (!block) return;

    var available = parseFloat(block.dataset.wdAvailable) || 0;
    var methodSel = block.querySelector('[data-wd-method]');
    var input     = block.querySelector('[data-wd-amount]');
    var submitBtn = block.querySelector('[data-wd-submit]');
    var allBtn    = block.querySelector('[data-wd-all]');
    var clearBtn  = block.querySelector('[data-wd-clear]');
    var feeEl     = block.querySelector('[data-wd-fee] span');
    var receiveEl = block.querySelector('[data-wd-receive] span');
    var feeLabel  = block.querySelector('[data-wd-fee]');    // для обновления процента в подписи       

    var fee = currentFee();

    // процент комиссии из выбранной опции селекта
    function currentFee(){
        var opt = methodSel.querySelector('.select-option.is-selected');
        return opt ? parseFloat(opt.dataset.fee) || 0 : 0;
    }

    // число → "$1 234.50" (точка, пробел в тысячах)
    function money(n){
        return '$' + n.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    }

    // форматирование прямо в поле: "20000.3023" / "1,5" → "20 000.30" / "1.5"
    function formatInput(){
        var v = input.value.replace(',', '.').replace(/[^\d.]/g, '');

        // только первая точка
        var i = v.indexOf('.');
        if (i !== -1) v = v.slice(0, i + 1) + v.slice(i + 1).replace(/\./g, '');

        var parts   = v.split('.');
        var intPart = parts[0].replace(/^0+(?=\d)/, '');                            // ведущие нули
        var decPart = parts[1] !== undefined ? parts[1].slice(0, 2) : undefined;    // максимум 2 знака

        intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');                    // пробелы в тысячах
        input.value = decPart !== undefined ? intPart + '.' + decPart : intPart;
    }

    // отформатированное поле → число
    function parseAmount(){
        return parseFloat(input.value.replace(/\s/g, '')) || 0;
    }

    function recalc(){
        var amount = parseAmount();
        var feeSum = amount * fee / 100;
        var get    = amount - feeSum;

        // подпись «Комиссия N%:» — обновляем процент, значение в span
        feeLabel.childNodes[0].textContent = 'Комиссия ' + fee + '%: ';
        feeEl.textContent     = money(feeSum > 0 ? feeSum : 0);
        receiveEl.textContent = money(get > 0 ? get : 0);

        submitBtn.disabled = !(amount > 0 && amount <= available);
    }

    // ввод → формат + пересчёт
    input.addEventListener('input', function(){
        formatInput();
        recalc();
    });

    // смена метода → новый процент
    methodSel.addEventListener('select:change', function(){
        fee = currentFee();
        recalc();
    });

    // вывести всё
    allBtn.addEventListener('click', function(){
        input.value = available.toFixed(2);
        formatInput();
        recalc();
    });

    // очистить
    clearBtn.addEventListener('click', function(){
        input.value = '';
        recalc();
    });

    recalc();   // старт: поле пустое → нули, кнопка выключена
})();
</script>
@endpush