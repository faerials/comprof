<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins bg-gray-50">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    @include('admin.layout.sidebar')

    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        @include('admin.layout.navbar')

        {{-- CONTENT --}}
        <main class="flex-1 px-10 pb-10 mt-6">
            @yield('content')
        </main>

    </div>

</div>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>
