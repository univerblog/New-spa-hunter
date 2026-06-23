@extends('layout.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/cabinet.css?v={{ rand() }}">  
@endpush

@section('content')
<section class="section">
    <div class="container">
        <div class="cabinet-wrapper">
             @include('components.cabinet.cabinet-nav')
            <div class="cabinet-main">
                @include('pages.cabinet.cabinet-start')
            </div>
        </div>  
      
    </div>
</section>

@endsection

@push('scripts')



@endpush