<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
                </a>

                <!-- Main Nav Links -->
                <div class="hidden sm:flex space-x-6">
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('goods.index') }}"
                        class="{{ request()->routeIs('goods.index') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                        Marketplace
                    </a>
                    <a href="{{ route('goods.create') }}"
                        class="{{ request()->routeIs('goods.create') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                        Sell Something
                    </a>
                </div>
            </div>

            <!-- Profile / Logout -->
            <div class="hidden sm:flex items-center space-x-4">
                <a href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.edit') ? 'text-blue-600 font-bold' : 'text-gray-800 hover:text-blue-500' }}">
                    {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-red-500">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
