<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Battles en cours</h1>
    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @forelse ($battles as $battle)
            <li>
                <x-battle-card :battle="$battle" />
            </li>
        @empty
        <li>
            pas de battle
        </li>
        @endforelse
    </ul>
    <div class="mt-8">
        {{ $battles->links() }}
    </div>

</x-guest-layout>
