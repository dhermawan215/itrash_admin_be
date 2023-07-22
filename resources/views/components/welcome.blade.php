<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- <x-application-logo class="block h-12 w-auto" /> -->
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Itrash Apps
    </h1>
    <h3 class="mt-8 text-xl font-medium text-gray-900">
        Selamat Datang di halaman akun
    </h3>
    @if (Auth::user()->roles=='admin')
    <p class="mt-6 text-gray-500 leading-relaxed">
        untuk akses aplikasi utama bisa klik link berikut: <a class="text-blue-500" href="{{route('admin.dashboard')}}">Dashboard</a>

    </p>
    @endif
</div>