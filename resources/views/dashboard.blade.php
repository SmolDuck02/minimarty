<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">My Dashboard</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-lg font-medium text-gray-700 mt-8 mb-4">Goods I've Bought</h3>

        @php
            $purchases = \App\Models\Good::where('bought_by', auth()->id())->get();
        @endphp

        @forelse ($purchases as $item)
            <div class="border border-gray-300 rounded-md p-4 mb-4 bg-white shadow-sm">
                <h4 class="font-semibold text-lg">{{ $item->name }} - ${{ $item->price }}</h4>
                <p class="text-gray-600">{{ $item->description }}</p>
                <p class="text-sm text-gray-500">Seller: {{ $item->user->name }}</p>
            </div>
        @empty
            <p class="text-gray-600">You haven't bought anything yet.</p>
        @endforelse
    </div>
</x-app-layout>
