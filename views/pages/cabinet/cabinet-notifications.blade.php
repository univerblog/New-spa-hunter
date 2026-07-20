@extends('layout.cabinet')

@section('content')
<div class="cab-page-title">
    <h1>Уведомления</h1>
    <p>События по вашему аккаунту, заказам и выплатам.</p>
</div>

@include('components.cabinet.notifications')
@endsection

@push('scripts')


@endpush