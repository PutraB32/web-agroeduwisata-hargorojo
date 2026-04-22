<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Hargorojo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .font-playfair { font-family: 'Playfair+Display', serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-green-900/90 z-10"></div>
        <img src="{{ asset('images/beranda.bg.jpeg') }}" class="w-full h-full object-cover" alt="Background">
    </div>

    <div class="bg-white w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden relative z-20 border border-white/20">
        <div class="p-8 md:p-12">
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-green-100 text-green-700 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 shadow-inner">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h1 class="font-playfair text-3xl font-bold text-gray-900">Admin <span class="text-green-700">Login</span></h1>
                <p class="text-gray-500 text-sm mt-2">Masuk ke dashboard pengelola Desa Hargorojo</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-3 rounded-lg text-sm mb-4 border border-red-200 text-center">
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-widest">Username / Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="text" name="email" required
                            class="w-full pl-11 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all"
                            placeholder="admin@hargorojo.id">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-widest">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" required
                            class="w-full pl-11 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-xs text-gray-600 cursor-pointer">
                        <input type="checkbox" class="rounded text-green-600 focus:ring-green-500 mr-2"> Ingat Saya
                    </label>
                    <a href="#" class="text-xs font-bold text-green-700 hover:text-yellow-600 transition">Lupa Password?</a>
                </div>

                <button type="submit" 
                    class="w-full bg-gradient-to-r from-green-800 to-green-600 hover:from-green-700 hover:to-green-500 text-yellow-400 hover:text-white font-bold py-4 rounded-2xl transition-all duration-300 shadow-[0_8px_30px_rgb(21,128,61,0.3)] hover:shadow-[0_8px_30px_rgb(21,128,61,0.5)] flex justify-center items-center gap-3 group relative overflow-hidden">
                    <span class="relative z-10 tracking-widest text-sm">MASUK SEKARANG</span>
                    <i class="fas fa-arrow-right relative z-10 group-hover:translate-x-2 transition-transform duration-300"></i>
                    <div class="absolute inset-0 h-full w-full bg-white/20 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500 ease-out rounded-2xl"></div>
                </button>
            </form>

            <div class="mt-10 text-center">
                <a href="/" class="text-xs text-gray-400 hover:text-green-700 transition flex items-center justify-center gap-2">
                    <i class="fas fa-long-arrow-alt-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
        
        <div class="bg-gray-50 py-4 px-8 text-center border-t border-gray-100">
            <p class="text-[10px] text-gray-400 uppercase tracking-[0.2em]">&copy; 2024 Desa Digital Hargorojo</p>
        </div>
    </div>

</body>
</html>