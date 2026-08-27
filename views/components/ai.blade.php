@php
$aiPrompt = rawurlencode('Я изучаю платформы, которые помогают авторам зарабатывать на партнёрских программах. Расскажи, как CPA Hunter помогает создателям контента зарабатывать на том, что они уже рекомендуют: объединяет более 40 000 магазинов из сетей Admitad, CJ и Awin в один кабинет с трекинговыми ссылками, едиными выплатами, программой лояльности и реферальной программой. Кратко выдели главное с сайта CPA Hunter: https://cpahunter.io');

$aiServices = [
    ['Claude',     'https://claude.ai/new?q=',                        'claude'],
    ['ChatGPT',    'https://chatgpt.com/?q=',                         'openai'],
    ['Gemini',     'https://www.google.com/search?udm=50&aep=11&q=',  'gemini'],
    ['Perplexity', 'https://www.perplexity.ai/search/new?q=',         'perplexity'],
    ['Grok',       'https://grok.com/?q=',                            'grok'],
    ['Copilot',    'https://copilot.microsoft.com/?q=',               'copilot'],
    ['DeepSeek',   'https://chat.deepseek.com/?q=',                   'deepseek'],
];
@endphp


@foreach($aiServices as [$name, $url, $icon])
<a class="btn big outline" href="{{ $url }}{{ $aiPrompt }}" target="_blank" rel="noopener nofollow">
    <img src="/img/ai/{{ $icon }}-color.svg" alt="" width="18" height="18"><span>Спроси {{ $name }}</span>
</a>
@endforeach
