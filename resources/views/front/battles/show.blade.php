<x-guest-layout>
    <h1 class="font-bold text-xl mb-4">Battle en cours</h1>

    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
        @forelse ($memes as $meme)
            <li>
                <x-meme-card :meme="$meme" />
            </li>
        @empty
        <li>
            pas de meme
        </li>
        @endforelse
    </ul>
    <div class="mt-8">
        {{-- {{ $memes->links() }} --}}
    </div>

</x-guest-layout>
