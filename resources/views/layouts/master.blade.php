<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Wisata Hargorojo')</title>

    @vite(['resources/css/app.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000;
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .premium-shadow {
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.08);
        }

        .image-hover-zoom {
            transition: transform 0.7s ease;
        }

        .group:hover .image-hover-zoom {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="overflow-x-hidden antialiased text-gray-800 selection:bg-green-600 selection:text-white">

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>

</html>