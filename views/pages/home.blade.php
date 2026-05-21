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
       <!-- <div class="dropdown-block">
            <div class="header-user-block dropdown-btn">
                
                <i class="fa-solid fa-caret-down"></i>
            </div>  
            <div class="dropdown-item">    
                <a href="/profile" ><i class="fa-solid fa-user"></i>Profile</a>
                <a href="" ><i class="fa-solid fa-dollar-sign fa-xl"></i>Balance</a>
                <a href="" ><i class="fa-solid fa-arrow-left-from-bracket fa-sm"></i>Logout</a>
            </div>
        </div> -->


        <!-- @include('components.accordeon') -->
            
    </div>
</div> 

<div class="container bg-black">
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



<script src="https://cdn.jsdelivr.net/npm/embla-carousel/embla-carousel.umd.js?v={{ rand() }}"></script>
<script src="https://unpkg.com/embla-carousel-class-names/embla-carousel-class-names.umd.js?v={{ rand() }}"></script>
<script type="text/javascript" src="js/embla.js?v={{ rand() }}"></script>  

<script src="js/fancybox/fancybox.js"></script>
<script>
    Fancybox.bind('[data-fancybox="video"]', {
    // Your custom options
    });
</script>
@endpush
