<x-app-layout>
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded shadow p-8 mb-8 grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            <div class="md:col-span-2">
                <h1 class="font-bold text-3xl mb-2 text-blue-700">{{ $battle->title }}</h1>
                <p class="mb-4 text-gray-700 text-base">{{ $battle->description }}</p>
                <p class="text-xs text-gray-400 mb-4">
                    {{-- Limite : {{ $battle->str_limit_date() }} --}}
                </p>
                @if ($battle->limit_date >= now())
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded mb-4">Battle en cours</span>
                @else
                    <span class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded mb-4">Battle clôturée</span>
                @endif
            </div>

            @if ($battle->limit_date >= now())
                <div>
                    <h2 class="font-bold text-lg mb-4 text-blue-600">Ajouter un mème</h2>
                    <x-meme-upload-field :battle="$battle" />
                </div>
            @endif
        </div>

        <h2 class="font-bold text-xl mb-6 text-blue-600">Mèmes en compétition</h2>
        <ul class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
            @forelse ($memes as $meme)
                <li>
                    <x-meme-card :meme="$meme" />
                </li>
            @empty
                <li class="col-span-full text-center text-gray-500 py-8">
                    Aucun mème pour cette battle.
                </li>
            @endforelse
        </ul>
        <div class="mt-8">
            {{ $memes->links() }}
        </div>
    </div>
</x-app-layout>
