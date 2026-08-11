@php 
$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';

$byId = [];
foreach ($faq as $tabIndex => $tab) {
    foreach ($tab['items'] ?? [] as $item) {
        if (isset($item['id'])) {
            $byId[$item['id']] = ['title' => $item['title'], 'tab' => $tabIndex];
        }
    }
}
@endphp

<div class="faq-wrapper">
    <div class="faq-item">
        <nav class="tabs-nav tabs-for-faq">
            @foreach ($faq as $i => $tab)
                <button class="tab-btn{{ $i === 0 ? ' active' : '' }}" onclick="switchTab({{ $i }})">
                    {!! $tab['icon'] !!}
                    <span class="tab-label">{{ __($tab['tab']) }}</span>
                    <span class="tab-count">{{ isset($tab['top']) ? count($tab['top']) : count($tab['items']) }}</span>
                </button>
            @endforeach
        </nav>
        <div class="faq-support">
            <span>{{ __('Didn\'t find an answer') }}</span>
            <a href="#" class="btn min outline">{{ __('Contact support') }}</a>
        </div>
    </div>

    <div class="faq-content">
        @foreach ($faq as $i => $tab)
            <div class="tab-panel{{ $i === 0 ? ' active' : '' }}">
                @if (isset($tab['top']))
                    <div class="faq-top-list">
                        @foreach ($tab['top'] as $id)
                            <button type="button" class="faq-top-link" data-goto="{{ $id }}">
                                <span>{{ __($byId[$id]['title']) }}</span>
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        @endforeach
                    </div>
                @else
                    <div class="accordion-wrapper" data-faq>
                        @foreach ($tab['items'] as $item)
                            <div class="accordion-item"@if(isset($item['id'])) data-q="{{ $item['id'] }}"@endif>
                                <div class="acc-title">
                                    <h3>{{ __($item['title']) }}</h3>
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="acc-content">
                                    <p>{!! __($item['content']) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- End tab panel -->
        @endforeach
    </div>
</div>

@push('scripts')
<script>
(function() {
    function closeAll(panel) {
        panel.querySelectorAll('.accordion-item.is-open').forEach(function(el) {
            el.querySelector('.acc-title').click();
        });
    }
    function openItem(item) {
        if (!item.classList.contains('is-open')) {
            item.querySelector('.acc-title').click();
        }
    }
    function centerTab(btn) {
        btn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
    }

    document.querySelectorAll('.faq-top-link').forEach(function(link) {
        link.addEventListener('click', function() {
            var id = this.dataset.goto;
            var target = document.querySelector('.accordion-item[data-q="' + id + '"]');
            if (!target) return;
            var panel = target.closest('.tab-panel');
            var index = Array.prototype.indexOf.call(document.querySelectorAll('.tab-panel'), panel);
            if (typeof switchTab === 'function') switchTab(index);
            setTimeout(function() {
                closeAll(panel);
                openItem(target);
                var activeBtn = document.querySelectorAll('.tabs-for-faq .tab-btn')[index];
                if (activeBtn) centerTab(activeBtn);
                target.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 50);
        });
    });

    document.querySelectorAll('.tabs-for-faq .tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            centerTab(this);
            setTimeout(function() {
                var panel = document.querySelector('.tab-panel.active');
                if (!panel) return;
                closeAll(panel);
                var first = panel.querySelector('.accordion-item');
                if (first) openItem(first);
            }, 50);
        });
    });
})();
</script>
@endpush