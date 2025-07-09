<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-gray-800">Welcome, {{ Auth::user()->name }}</h2>
            <a href="{{ route('goods.create') }}" class="inline-flex items-center gap-2 py-1.5 px-5 bg-blue-600 text-white text-sm font-medium rounded-full shadow hover:bg-blue-700 transition-all duration-200">
                + List a Good
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($goods as $good)
            <div class="border border-gray-300 rounded-md p-4 m-4 bg-white shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">{{ $good->name }} - ${{ $good->price }}</h3>
                <p class="text-gray-600 mb-1">{{ $good->description }}</p>
                <p class="text-sm text-gray-500 mb-3">Seller: {{ $good->user->name }}</p>

                @if ($good->user_id === auth()->id())
                    <div class="flex gap-2">
                        <div x-data="{ confirmDelete: false }" class="flex gap-2">
                            <a href="{{ route('goods.edit', $good) }}" 
                            class="inline-flex items-center px-4 py-2 text-sm font-medium bg-yellow-500 text-white rounded shadow hover:bg-yellow-600 transition">
                            Edit</a>

                            <!-- Delete Button -->
                            <button @click="confirmDelete = true" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                                Delete</button>

                            <!-- Delete Confirmation Modal -->
                            <div x-show="confirmDelete"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                                style="display: none;" 
                                x-cloak>
                                <div class="bg-white p-6 rounded shadow-md text-center">
                                    <p>Are you sure you want to delete <strong>{{ $good->name }}</strong>?</p>
                                    <div class="mt-4 flex justify-center gap-4">
                                        <form action="{{ route('goods.destroy', $good) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Yes, Delete</button>
                                        </form>
                                        <button @click="confirmDelete = false" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div x-data="{ confirmBuy: false }">
                        <button @click="confirmBuy = true" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Buy</button>

                        <div x-show="confirmBuy" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded shadow-md text-center">
                                <p>Buy <strong>{{ $good->name }}</strong> for ${{ $good->price }}?</p>
                                <div class="mt-4 flex justify-center gap-4">
                                    <form action="{{ route('goods.buy', $good) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Confirm</button>
                                    </form>
                                    <button @click="confirmBuy = false" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
