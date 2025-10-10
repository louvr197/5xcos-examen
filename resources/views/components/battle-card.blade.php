@php
    $winner = $battle->winner();
@endphp
<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
        href="{{ route('front.battles.show', $battle) }}">
        <figure>


            @if ($winner)
                <img src="{{ asset('storage/' . $winner->meme_path) }}" alt="Mème gagnant"
                    class="w-full h-48 object-cover rounded">
            @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded">
                    <span class="text-gray-500">Aucun mème</span>
                </div>
            @endif
        </figure>
        <div class="uppercase font-bold text-gray-800">
            {{ $battle->title }}
        </div>
        <div class="flex-grow text-gray-700 text-sm text-justify">
            {{ Str::limit($battle->description, 120) }}
        </div>
        <div class="text-xs text-gray-500">
            {{ $battle->limit_date }}
            @if ($battle->limit_date >= now())
                En cours
            @else
                cloturée
            @endif
        </div>
    </a>
</div>
