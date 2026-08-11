@php 
$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';
@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/ather-pages.css?v={{ rand() }}">
@endpush

@section('content')
<nav class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-list">
            <a href="/">Главная</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="/">Какой то пункт</a>
             <i class="fa-solid fa-chevron-right"></i>
            <span>Справочный центр</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Есть вопросы? Мы поможем</h1>
        <p>Выберите тему или напишите нашей команде напрямую.</p>
      </div>
      @include('components.faq')
    </div>
</section>
@endsection

@push('scripts')

@endpush