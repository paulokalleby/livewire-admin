<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title')
    </title>
    <link href="{{ Vite::asset('resources/img/icone.ico') }}" rel="icon" type="image/ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    @auth
        <div class="wrapper">

            @include('layouts.partials.sidebar')

            <div class="main">

                @include('layouts.partials.navbar')

                <main class="content">
                    <div class="container-fluid p-0">

                        {{ $slot }}

                    </div>
                </main>

                @include('layouts.partials.footer')

            </div>
        </div>
    @endauth
    
    @guest
        <main class="d-flex w-100">
            <div class="container d-flex flex-column">
                <div class="row vh-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endguest

    <x-toaster-hub />

    <script>
        const toggle = () => {
            Alpine.store('collapsed').status = !Alpine.store('collapsed').status;
        }

        document.addEventListener('alpine:init', () => {
            Alpine.store('collapsed', {
                status: false,
            })
        })
    </script>

</body>

</html>
