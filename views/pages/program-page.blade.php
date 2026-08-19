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
            <a href="/">Программы</a>
             <i class="fa-solid fa-chevron-right"></i>
            <span>Дети и родительство</span>
        </div>
    </div>
</nav>

<section class="section">
  <div class="container">
     <div class="section-title">
        <h1>Мама-блогерам доверяют больше всех. <span class="lime">Превратите доверие в доход</span></h1>
        <p>Мама-блогерам доверяют как никому: семья тратит ~$12 000 на детское в первый год. 37 магазинов в каталоге. Средний чек $30-1 000, комиссии 3-15%.</p>
        <small>Обновлено в мае 2026</small>
      </div>
      <div class="btn-group center-group">
        <a href="" class="btn">Создать первую ссылку – бесплатно</a>
      </div>
    </div>
</section>

<section class="section">
  <div class="container">
     <div class="section-title">
        <p class="text-eyebrow">Бренды-партнёры</p>
        <h2>Топ детских магазинов</h2>
      </div>
      @include('components.shops-category')
    </div>
</section>
@endsection

@push('scripts')

@endpush