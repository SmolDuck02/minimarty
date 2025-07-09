<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Create Good</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6">
        <form action="{{ route('goods.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                <input id="name" name="name" required class="w-full border-gray-300 rounded-md shadow-sm mt-1" placeholder="Name">
            </div>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror


            <div>
                <label for="price" class="block font-medium text-sm text-gray-700">Price</label>
                <input id="price" name="price" type="number" step="0.01" required class="w-full border-gray-300 rounded-md shadow-sm mt-1" placeholder="Price">
            </div>
             @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <div>
                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm mt-1" placeholder="Description (optional)"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    List for Sale
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
