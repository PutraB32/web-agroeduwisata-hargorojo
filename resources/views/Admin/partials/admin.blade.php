<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md border-t-4 border-green-600">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Halo, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 mb-6">Anda masuk sebagai <span class="bg-green-100 text-green-800 font-bold px-2 py-1 rounded">Admin</span>.</p>
        
        <div class="bg-green-50 p-4 rounded-lg mb-6 border border-green-200">
            <h2 class="font-bold text-green-800 text-lg mb-3">Menu Operasional Admin:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="#" class="block p-4 bg-white border border-green-200 rounded-lg shadow-sm hover:shadow-md hover:bg-green-100 transition-all duration-200 group">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 group-hover:bg-green-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-green-900">Kelola Produk</h3>
                            <p class="text-sm text-green-700">Database & Fitur CRUD</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        @include('Admin.partials.produk_crud')

        <div class="mt-8 flex justify-end">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-red-800 to-red-600 hover:from-red-700 hover:to-red-500 text-yellow-100 hover:text-white font-bold px-6 py-3 rounded-xl transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 border border-red-500/30 group">
                    <i class="fas fa-sign-out-alt group-hover:-translate-x-1 transition-transform"></i> Keluar / Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>