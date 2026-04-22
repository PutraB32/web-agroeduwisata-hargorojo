<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Wisata Hargorojo')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        theme: {
                            light: '#f5f1ef',
                            beige: '#eadae0',
                            blush: '#d9c2bd',
                            dark: '#c4a7a1',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine JS -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fafafa; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        .premium-shadow { box-shadow: 0 10px 40px -10px rgba(0,0,0,0.08); }
        .image-hover-zoom { transition: transform 0.7s ease; }
        .group:hover .image-hover-zoom { transform: scale(1.05); }
    </style>
</head>

<body class="text-gray-800 antialiased overflow-x-hidden selection:bg-green-600 selection:text-white">

<!-- NAVBAR -->
@include('layouts.navbar')

<!-- CONTENT -->
<main class="pt-[72px] min-h-screen">
    @yield('content')
</main>

<!-- FOOTER -->
@include('layouts.footer')

</body>
</html>