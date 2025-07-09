<x-app-layout>
    <x-slot name="header">
        <h2>My Dashboard</h2>
    </x-slot>

    <h3 style="margin-top:2rem;">Goods I've Bought</h3>

    @php
        $purchases = \App\Models\Good::where('bought_by', auth()->id())->get();
    @endphp

    @forelse ($purchases as $item)
        <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
            <strong>{{ $item->name }}</strong> - ${{ $item->price }}<br>
            <p>{{ $item->description }}</p>
            <p>Seller: {{ $item->user->name }}</p>
        </div>
    @empty
        <p>You haven't bought anything yet.</p>
    @endforelse

</x-app-layout>
