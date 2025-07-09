<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Good</h2>
    </x-slot>

    <form action="{{ route('goods.update', $good) }}" method="POST" class="max-w-xl mx-auto mt-8">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $good->name }}" class="w-full border p-2 mb-4" required>
        <input name="price" type="number" step="0.01" value="{{ $good->price }}" class="w-full border p-2 mb-4" required>
        <textarea name="description" class="w-full border p-2 mb-4">{{ $good->description }}</textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</x-app-layout>
