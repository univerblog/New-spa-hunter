@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Источники трафика</h1>
    <p>Соцсети и площадки, с которых вы отправляете аудиторию. Кликните по плитке – подключим через OAuth.</p>
</div>

@include('components.cabinet.sources')
@endsection