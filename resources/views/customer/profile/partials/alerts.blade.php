@if(session('success'))
    <div class="mt-8 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
        <i class="fa-solid fa-circle-check mr-2"></i>
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mt-8 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
        <i class="fa-solid fa-circle-exclamation mr-2"></i>
        {{ $errors->first() }}
    </div>
@endif
