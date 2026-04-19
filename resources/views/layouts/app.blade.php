<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The Farm Care - Professional veterinary and farm equipment solutions.">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo.png') }}">

    <title>@yield('title', config('app.name', 'The Farm Care') . ' | Professional Vet Equipment')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="site-body">

    <div class="site-shell">
        @include('partials.navbar')

        <main class="site-main">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @stack('scripts')

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: @json(session('error')),
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif

    @if(session('newsletter_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Subscribed!',
                    text: @json(session('newsletter_success')),
                    confirmButtonText: 'Nice'
                });
            });
        </script>
    @endif

</body>
</html>
