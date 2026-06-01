@php 
//$faq = include $_SERVER['DOCUMENT_ROOT'] . '/views/data/faq.php';

@endphp

@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/home-page.css?v={{ rand() }}">
    <!-- slider-style -->
    <link rel="stylesheet" href="css/embla.css?v={{ rand() }}">  
    <!-- fancybox-style -->
    <link rel="stylesheet" href="/js/fancybox/fancybox.css"/>
@endpush

@section('content')



<div class="container" id="scroll-block-1" style="scroll-margin-top: 30px;">
    <div class="container-item">
        <div class="container-title">
            <h2><span>How</span> It 00012 Works123</h2>
            <p>From signup to first commission in 4 simple steps.</p>
        </div>
        <div class="layout-form">
            <div class="input-group">
                <div class="input-field">
                    <label for="2">Email</label>
                    <input type="text" id="2" placeholder="Enter the URL" maxlength="150">
                </div>
                <div class="input-field">
                    <label>Имя</label>
                    <input type="text" placeholder="Имя" maxlength="150">
                </div>
                <div class="input-field">
                    <label>Пароль</label>
                    <input type="password" placeholder="" maxlength="150">
                </div>
            </div>
        </div>


        <!-- @include('components.accordeon') -->
            
    </div>
</div> 



<div class="container">
    <div class="container-item">
        <div class="container-title">
            <h2>Формы</h2>
            <p>From signup to first commission in 4 simple steps.</p>
        </div>
 
        <div class="flex-block-wrapper">
            @include('components.form')
        </div>
            
    </div>
</div> 


@endsection

@push('scripts')



@endpush
