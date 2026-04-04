{{-- This file is used to switch between languages in the admin panel. It is included in the navbar partial. --}}
@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    $locale = LaravelLocalization::getCurrentLocale() == 'ar' ? 'en' : 'ar';
@endphp
<a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL($locale) }}" id="langSwitcher">
    {{-- <i class="fe fe-globe fe-16"></i> --}}
    {{ strtoupper($locale) }}
</a>
