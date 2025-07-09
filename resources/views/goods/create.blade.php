<x-app-layout>
    <x-slot name="header">Create Good</x-slot>

    <form action="{{ route('goods.store') }}" method="POST">
        @csrf
        <input name="name" placeholder="Name" required>
        <input name="price" type="number" step="0.01" placeholder="Price" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">List for Sale</button>
    </form>
</x-app-layout>
