@php 
$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';
@endphp

<div class="faq-wrapper">
    <div class="faq-item">
        <nav class="tabs-nav tabs-for-faq">
            @foreach ($faq as $i => $tab)
                <button class="tab-btn{{ $i === 0 ? ' active' : '' }}" onclick="switchTab({{ $i }})">
                    {!! $tab['icon'] !!}
                    <span class="tab-label">{{ __($tab['tab']) }}</span>
                    <span class="tab-count">{{ count($tab['items']) }}</span>
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
                <div class="accordion-wrapper" data-faq>
                    @foreach ($tab['items'] as $item)
                        <div class="accordion-item">
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
            </div>
            <!-- End tab panel -->
        @endforeach
    </div>
</div>