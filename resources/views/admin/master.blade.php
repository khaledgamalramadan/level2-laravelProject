@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
@endphp
<!doctype html>
{{--  Set page language and direction dynamically: - lang: changes based on current locale (ar / en) - dir: sets text direction (RTL for Arabic, LTR for others) --}}
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : 'ltr' }}">
@include('admin.partials.head')

<body class="vertical  light  rtl">
    <div class="wrapper">
        @include('admin.partials.navbar')

        @include('admin.partials.sidpar')

        <main role="main" class="main-content">

            @yield('content')

        </main> <!-- main -->

    </div> <!-- .wrapper -->

    @include('admin.partials.scripts')
    <script>
        function confirmDelete(id) {
            if (confirm('Are You Sure You Want To Delete This Record ?')) {
                document.getElementById('deleteForm-' + id).submit();
            }
        }
    </script>
</body>

</html>
