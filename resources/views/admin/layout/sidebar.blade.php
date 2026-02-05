<aside class="w-64 bg-white border-r">

    <div class="px-6 py-5 text-xl font-semibold">
        UMAHKU.
    </div>

    <ul class="space-y-2 px-4 text-sm">

        {{-- Dashboard --}}
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.dashboard')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Dashboard
            </a>
        </li>

        {{-- Products --}}
        <li>
            <a href="{{ route('admin.products.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.products.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Products
            </a>
        </li>

   

        {{-- Gallery --}}
        <li>
            <a href="{{ route('admin.galleries.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.galleries.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Gallery
            </a>
        </li>

        {{-- Articles --}}
        <li>
            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.articles.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Articles
            </a>
        </li>

        {{-- Clients --}}
        <li>
            <a href="{{ route('admin.clients.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.clients.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Clients
            </a>
        </li>

        {{-- Events --}}
        <li>
            <a href="{{ route('admin.events.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.events.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Events
            </a>
        </li>

        {{-- Contacts --}}
        <li>
            <a href="{{ route('admin.contacts.index') }}"
               class="flex items-center p-3 rounded-lg transition
               {{ request()->routeIs('admin.contacts.*')
                    ? 'bg-gray-200 font-medium'
                    : 'hover:bg-gray-200' }}">
                Contacts
            </a>
        </li>


    </ul>
</aside>
