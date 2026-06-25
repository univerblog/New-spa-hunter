<!DOCTYPE html>
<html lang="en">
<head>
@include('components.head')
<link rel="stylesheet" type="text/css" href="/css/cabinet.css?v={{ rand() }}">  
@stack('styles')
</head>
<body>

<div class="wrapper">
    @include('components.header')
    <main>
        <section class="section">
            <div class="container">
                <div class="cabinet-wrapper">
                    @include('components.cabinet.cabinet-nav')
                    <div class="cabinet-main">
                         @yield('content')
                    </div>
                </div>  
            
            </div>
        </section>
    </main>
     @include('components.footer')
</div>

<!-- Тут общая модалка -->
@include('components.modal.modal-windows')
@include('components.modal.modal')
 
<!------------------------->

@yield('scripts')
@stack('scripts')

<script src="/js/my.js?v={{ rand() }}"></script>
</body>
</html>

