<header class="h-20 flex items-center justify-between px-10">

    <div>
        <h2 class="text-2xl font-semibold text-slate-900">
            @yield('title')
        </h2>
        <p class="text-sm text-slate-500">
            Welcome back! Here's what's happening.
        </p>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button
            class="px-4 py-2 text-sm rounded-full
                   text-red-600 bg-red-100 hover:text-red-700
                   hover:bg-red-200 transition">
            Logout
        </button>
    </form>

</header>
