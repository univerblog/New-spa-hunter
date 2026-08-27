@php
$legalPages = [
    'terms' => ['Условия использования', 'fa-regular fa-file-lines'],
    'privacy' => ['Политика конфиденциальности', 'fa-regular fa-shield'],
    'compliance' => ['Правила и проверка', 'fa-regular fa-shield-check'],
    'dnss' => ['Не продавать данные', 'fa-regular fa-ban'],
    'cookie' => ['Cookie', 'fa-regular fa-cookie-bite'],
    'cookie-settings' => ['Настройки cookie', 'fa-regular fa-sliders'],
];
@endphp
<div class="legal-nav-box dropdown-block">
    <button class="dropdown-btn"><span><i class="fa-solid fa-bars"></i> Вся правовая информация</span><i class="fa-solid fa-chevron-down"></i></button>
    <nav class="legal-nav">
        @foreach($legalPages as $path => [$label, $icon])
            @if($route === '/' . $path)
                <a href="/{{ $path }}" class="active"><i class="{{ $icon }}"></i><span>{{ $label }}</span></a>
            @else
                <a href="/{{ $path }}"><i class="{{ $icon }}"></i><span>{{ $label }}</span></a>
            @endif
        @endforeach
    </nav>
</div>

