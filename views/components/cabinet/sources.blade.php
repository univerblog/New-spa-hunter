@php
    $data      = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/sources.php';
    $platforms = $data['platforms'];
    $statuses  = $data['statuses'];

    // состояние (бэк заменит на выборку из БД)
    if (!isset($_SESSION['sources'])) $_SESSION['sources'] = $data['connected'];

    // действия (бэк заменит на insert/delete)
    $action = $_POST['action']   ?? '';
    $key    = $_POST['platform'] ?? '';

    if ($action === 'connect' && isset($platforms[$key])) {
        $handle = ltrim(trim($_POST['handle'] ?? ''), '@');
        if ($handle === '') $handle = 'demo_account';

        $_SESSION['sources'][] = [
            'platform' => $key,
            'url'      => $platforms[$key]['domain'] . $handle,
            'status'   => $platforms[$key]['result'],
        ];
    }

    if ($action === 'delete') {
        $_SESSION['sources'] = array_values(array_filter($_SESSION['sources'], fn($s) => $s['platform'] !== $key));
    }

    $connected     = $_SESSION['sources'];
    $connectedKeys = array_column($connected, 'platform');
    $count         = count($connected);
@endphp

<div class="sources" id="sources">

    @if ($count)
        <div class="sources-card-head">
            <i class="fa-solid fa-circle"></i>
            <span>{{ $count }} источников подключено</span>
        </div>

        <div class="sources-list">
            @foreach ($connected as $row)
                @php
                    $p  = $platforms[$row['platform']];
                    $st = $statuses[$row['status']];
                @endphp
                <div class="source-row{{ $row['status'] === 'active' ? '' : ' ' . $st['class'] }}">
                    {!! $p['icon'] !!}
                    <div class="source-row_cont">
                        <strong>{{ $p['name'] }}</strong>
                        <small>{{ $row['url'] }}</small>
                    </div>
                    @if ($row['status'] !== 'active')
                        <span class="badge {{ $st['class'] }}">{{ $st['label'] }}</span>
                    @endif
                    <button class="source-row__menu" data-source-menu><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    <div class="source-row__pop">
                        <button data-delete="{{ $row['platform'] }}"><i class="fa-regular fa-trash-can"></i>Удалить</button>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="sources-empty cab-card">
            <div class="sources-empty-title">
                <i class="fa-regular fa-link-horizontal-slash"></i>
                <span>У вас нет ни одного источника</span>
            </div>
            <p>Подключите хотя бы один, чтобы создавать ссылки.</p>
        </div>
    @endif

    <h3>Подключить источник</h3>

    <div class="sources-platforms">
        @foreach ($platforms as $k => $p)
            <button class="platform-tile" data-platform="{{ $k }}" onclick="openModal('{{ $p['connect'] === 'input' ? 'modal-connect-input-source' : 'modal-connect-source' }}')" {{ in_array($k, $connectedKeys) ? 'disabled' : '' }}>{!! $p['icon'] !!}{{ $p['name'] }}</button>
        @endforeach
    </div>
    <div class="cabinet-line"></div>

    <div class="sources-note">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <div>
            <strong>Создавать ссылки можно сразу</strong>
            <small>Площадку проверяем в течение 24 часов. Не подойдёт под наши программы – сообщим.</small>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function(){
    var current = null;   // ключ площадки, с которой работаем

    function send(body){
        var modal = document.querySelector('.modal-content.is-loading');

        fetch(location.pathname, {
            method: 'POST',
            headers: { 'X-Fragment': 'sources', 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(body)
        })
        .then(function(r){ return r.text(); })
        .then(function(html){
            var delay = modal ? 1200 : 0;
            setTimeout(function(){
                document.getElementById('sources').outerHTML = html;
                if (modal) modal.classList.remove('is-loading');
                closeModal();
            }, delay);
        });
    }

    function setName(name){
        document.querySelectorAll('[data-platform-name]').forEach(function(el){ el.textContent = name; });
    }

    document.addEventListener('click', function(e){
        var menuBtn = e.target.closest('[data-source-menu]');
        var pop = menuBtn ? menuBtn.nextElementSibling : null;
        document.querySelectorAll('.source-row__pop.show').forEach(function(p){
            if (p !== pop) p.classList.remove('show');
        });
        if (pop) { pop.classList.toggle('show'); return; }

        var tile = e.target.closest('.platform-tile');
        if (tile) { current = tile.dataset.platform; setName(tile.textContent.trim()); return; }

        var del = e.target.closest('[data-delete]');
        if (del) {
            current = del.dataset.delete;
            setName(del.closest('.source-row').querySelector('strong').textContent);
            openModal('modal-link-delete');
            return;
        }

        var ok = e.target.closest('[data-connect-oauth], [data-connect-submit]');
        if (ok) {
            e.preventDefault();
            var handle = '';
            if (ok.hasAttribute('data-connect-submit')) {
                var input = document.querySelector('[data-connect-handle]');
                if (!input.value.trim()) { input.focus(); return; }
                handle = input.value;
                input.value = '';
            }
            ok.closest('.modal-content').classList.add('is-loading');
            send({ action: 'connect', platform: current, handle: handle });
            return;
        }

        if (e.target.closest('[data-delete-confirm]')) send({ action: 'delete', platform: current });
    });
})();
</script>
@endpush