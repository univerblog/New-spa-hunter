@php 
$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq-short.php';
@endphp

<div class="accordion-wrapper" data-faq data-open-first="false">
    @foreach ($faq as $item)
        <div class="accordion-item">
            <div class="acc-title">
                <h3>{!! $item['title'] !!}</h3>
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="acc-content">
                <p>{!! $item['content'] !!}</p>
            </div>
        </div>
    @endforeach
</div>