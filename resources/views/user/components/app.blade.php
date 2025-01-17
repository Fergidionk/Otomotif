<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otomotif</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>
    @vite('resources/css/app.css')

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="font-bevietnam">
    <header>
        @include('user/components.navbar')
    </header>
    <div class="flex flex-col">
        <main class="flex-grow bg-[#F7F7F8]">
            @yield('content')
        </main>
    </div>

    @include('user/components.footer')

    <script src="https://kit.fontawesome.com/61dd260dcf.js" crossorigin="anonymous"></script>

</body>

</html>
