<x-app-layout>
    <x-slot name="header">
        <h2>Marketplace</h2>
    </x-slot>

    <a href="{{ route('goods.create') }}">+ List a Good</a>

    @foreach ($goods as $good)
        <div style="margin-top: 1rem; border: 1px solid #ccc; padding: 10px;">
            <h3>{{ $good->name }} - ${{ $good->price }}</h3>
            <p>{{ $good->description }}</p>
            <p>Seller: {{ $good->user->name }}</p>

            @if ($good->user_id === auth()->id())
                <a href="{{ route('goods.edit', $good) }}">Edit</a>
                <form action="{{ route('goods.destroy', $good) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @else
                <form action="{{ route('goods.buy', $good) }}" method="POST">
                    @csrf
                    <button type="submit">Buy</button>
                </form>
            @endif
        </div>
    @endforeach
</x-app-layout>
