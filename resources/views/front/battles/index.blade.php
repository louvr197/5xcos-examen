<x-app-layout>
    <h1 class="font-bold text-2xl mb-6">Liste des Battles </h1>
    <a class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition
    "
        href="{{ route('front.battles.create') }}">Nouvelle battle</a>

    <form method="GET" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par titre..."
            class="border rounded px-2 py-1">
        <select name="status" class="border rounded px-2 py-1">
            <option value="">Tous</option>
            <option value="open" @selected(request('status') === 'open')>Ouverts</option>
            <option value="closed" @selected(request('status') === 'closed')>Clos</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrer</button>
    </form>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($battles as $battle)
            {{-- <li> --}}
                <x-battle-card :battle="$battle" />
            {{-- </li> --}}
        @empty
            {{-- <li> --}}
                pas de battle
            {{-- </li> --}}
        @endforelse
    </ul>
    <div class="mt-8">
        {{ $battles->links() }}
    </div>

</x-app-layout>
