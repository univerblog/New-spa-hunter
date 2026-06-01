<!DOCTYPE html>
<html lang="en">
<head>
    
@include('components.head')
@stack('styles')
</head>
<body>

<div class="wrapper">

    @include('components.header')
    <main>
       


        @yield('content')
    </main>
     @include('components.footer')
</div>

<!-- Тут общая модалка -->
@include('components.forms.login')
@include('components.modal')
 
<!------------------------->

@yield('scripts')
@stack('scripts')

<script src="/js/my.js?v={{ rand() }}"></script>
</body>
</html>

