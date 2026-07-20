@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Налоговая информация</h1>
    <p>Налоговые формы и годовые отчёты.</p>
</div>

@include('components.cabinet.tax-profiles')
@include('components.cabinet.tax-reports')

@endsection

@push('scripts')


@endpush