@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/modal.css?v={{ rand() }}">  
@endpush
{{-- ============================================================
    УНИВЕРСАЛЬНАЯ СИСТЕМА МОДАЛОК (схема: один шелл, разные .modal-content)
    
    Структура:
      modal-wrapper (фон)
        └ modal-window (один шелл с кнопкой закрытия)
           ├ .modal-content #modal-dynamic   ← для динамических, innerHTML copy
           └ .modal-content #modal-X         ← статичные, пушатся через @push('modals')
============================================================ --}}

<div class="modal-wrapper" id="modal-backdrop">
    <div class="modal-window">
        <div class="close" onclick="closeModal()"><i class="fa-regular fa-xmark"></i></div>

        {{-- Шелл для динамических модалок --}}
        <div class="modal-content" id="modal-dynamic" style="display:none;"></div>

        {{-- Сюда страницы пушат свои статичные .modal-content --}}
        @stack('modals')
    </div>
</div>


@push('scripts')
<script>
(function() {
    var _active        = null;
    var backdrop       = document.getElementById('modal-backdrop');
    var modalWindow    = backdrop.querySelector('.modal-window');
    var dynamicContent = document.getElementById('modal-dynamic');

    window.openModal = function(id, options) {
        options = options || {};
        var source = document.getElementById(id);

        if (!source) {
            console.error('openModal: элемент с id "' + id + '" не найден');
            return;
        }

        // Закрыть предыдущий
        if (_active) {
            var prev = document.getElementById(_active);
            if (prev) prev.style.display = 'none';
        }

        var targetEl;

        if (source.classList.contains('modal-content')) {
            // Схема 1: статичный контент
            source.style.display = 'block';
            _active = id;
            targetEl = source;
        } else {
            // Схема 2: динамическая копия
            dynamicContent.innerHTML = source.innerHTML;
            dynamicContent.style.display = 'block';
            _active = 'modal-dynamic';
            targetEl = dynamicContent;
        }

        modalWindow.className = 'modal-window' + (options.className ? ' ' + options.className : '');

        backdrop.classList.add('open');                // ← вместо display:flex
        document.body.style.overflow = 'hidden';

        if (typeof options.onOpen === 'function') {
            options.onOpen(targetEl);
        }
    };

    window.closeModal = function() {
        if (_active) {
            var content = document.getElementById(_active);
            if (content) content.style.display = 'none';

            if (_active === 'modal-dynamic') {
                dynamicContent.innerHTML = '';
            }
            _active = null;
        }
        modalWindow.className = 'modal-window';
        backdrop.classList.remove('open');             // ← снимаем класс
        document.body.style.overflow = '';
    };

    var _downOnBackdrop = false;

    backdrop.addEventListener('mousedown', function (e) {
        _downOnBackdrop = (e.target === this);   // нажатие началось именно на фоне
    });

    backdrop.addEventListener('click', function (e) {
        if (e.target === this && _downOnBackdrop) closeModal();
        _downOnBackdrop = false;
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && backdrop.classList.contains('open')) {
            closeModal();
        }
    });
})();
</script>
@endpush