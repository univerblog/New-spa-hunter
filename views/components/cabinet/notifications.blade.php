@php
    $data       = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/notifications.php';
    $categories = $data['categories'];
    $periods    = $data['periods'];
    $all        = $data['rows'];

    foreach ($all as $i => $r) $all[$i]['id'] = $i;

    // счётчики непрочитанных по категориям
    $counts = [];
    foreach ($all as $r) {
        if (empty($r['unread'])) continue;
        $counts['all']     = ($counts['all'] ?? 0) + 1;
        $counts[$r['cat']] = ($counts[$r['cat']] ?? 0) + 1;
    }
@endphp
<div class="cab-card notif-block" id="notifications">

    <div class="notif-block-head">
        <nav class="tabs-nav tabs-for-notif">
            @foreach ($categories as $key => $c)
                <button class="tab-btn{{ $loop->first ? ' active' : '' }}" data-cat="{{ $key }}" onclick="switchTab({{ $loop->index }})">    
                    {!! $c['icon'] !!}
                    <span class="tab-label">{{ $c['name'] }}</span>
                    @if (!empty($counts[$key]))<span class="tab-count">{{ $counts[$key] }}</span>@endif
                </button>
            @endforeach
        </nav>
        <div class="notif-block-head_actions">
            <button class="cab-link" data-notif-read-all><span>Отметить все прочитанным</span></button>
            <button class="notif-setting-btn" onclick="openModal('modal-notif-settings', { className: 'long' })"><i class="fa-regular fa-gear"></i></button>
        </div>
    </div>

    @foreach ($categories as $key => $c)
        @php
            $rows = $key === 'all' ? $all : array_values(array_filter($all, fn($r) => $r['cat'] === $key));

            $grouped = [];
            foreach ($rows as $r) $grouped[$r['period']][] = $r;

            $n = 0;
        @endphp

        <div class="tab-panel{{ $loop->first ? ' active' : '' }}">
            @foreach ($periods as $pKey => $pLabel)
                @if (!empty($grouped[$pKey]))
                    <div class="notif-group{{ $n >= 6 ? ' is-hidden' : '' }}">{{ $pLabel }}</div>

                    @foreach ($grouped[$pKey] as $row)
                        @php $n++; @endphp
                        <div class="notif-item{{ !empty($row['unread']) ? ' unread' : '' }}{{ $n > 6 ? ' is-hidden' : '' }}" data-id="{{ $row['id'] }}" data-cat="{{ $row['cat'] }}">                        
                            <div class="notif-item__icon">{!! $categories[$row['cat']]['icon'] !!}</div>
                            <div class="notif-item__body">
                                <div class="notif-item__text">{{ $row['text'] }}</div>
                                <div class="notif-item__date">{{ $row['date'] }}</div>
                            </div>
                            @if (!empty($row['unread']))
                                <button class="notif-item__read" data-notif-read>Прочитать</button>
                            @endif
                        </div>
                    @endforeach
                @endif
            @endforeach
            @if (count($rows) > 6)
                <div class="notif-loadmore-wrap"><button class="notif-loadmore" data-notif-more>Показать ещё</button></div>
            @endif
        </div>
    @endforeach

</div>

@push('scripts')
<script>
(function(){
    var block = document.getElementById('notifications');
    if (!block) return;

    // уменьшить счётчик на табе категории
    function dec(cat){
        var c = block.querySelector('.tab-btn[data-cat="' + cat + '"] .tab-count');
        if (!c) return;
        var n = parseInt(c.textContent, 10) - 1;
        n > 0 ? c.textContent = n : c.remove();
    }

    block.addEventListener('click', function(e){
        var btn = e.target.closest('[data-notif-read]');
        if (!btn) return;

        var item = btn.closest('.notif-item');
        var id   = item.dataset.id;

        // снять непрочитанное во всех копиях (панель «Все» + панель категории)
        block.querySelectorAll('.notif-item[data-id="' + id + '"]').forEach(function(it){
            it.classList.remove('unread');
            var b = it.querySelector('[data-notif-read]');
            if (b) b.remove();
        });

        dec('all');
        dec(item.dataset.cat);
    });
    // Отметить все прочитанными
    block.addEventListener('click', function(e){
        if (!e.target.closest('[data-notif-read-all]')) return;
        block.querySelectorAll('.notif-item.unread').forEach(function(it){
            it.classList.remove('unread');
            var b = it.querySelector('[data-notif-read]');
            if (b) b.remove();
        });
        block.querySelectorAll('.tab-count').forEach(function(c){ c.remove(); });
    });
    // Показать еще
    block.addEventListener('click', function(e){
        var btn = e.target.closest('[data-notif-more]');
        if (!btn) return;
        var panel = btn.closest('.tab-panel');

        panel.querySelectorAll('.notif-item.is-hidden').forEach(function(it, i){
            if (i < 6) it.classList.remove('is-hidden');
        });

        panel.querySelectorAll('.notif-group.is-hidden').forEach(function(g){
            var el = g.nextElementSibling;
            while (el && !el.classList.contains('notif-group')) {
                if (!el.classList.contains('is-hidden')) { g.classList.remove('is-hidden'); break; }
                el = el.nextElementSibling;
            }
        });

        if (!panel.querySelector('.notif-item.is-hidden')) btn.closest('.notif-loadmore-wrap').remove();
    });

})();
</script>
@endpush