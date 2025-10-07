<div>
     <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
        href="{{ route('front.battles.show', $battle) }}">
         <figure>
        <img src="{{ asset('storage/' . $battle->winner()->meme_path) }}" alt="{{ asset('storage/' . $battle->winner()->meme_path) }}">
    </figure>
        <div class="uppercase font-bold text-gray-800">
            {{ $battle->title }}
        </div>
        <div class="flex-grow text-gray-700 text-sm text-justify">
            {{ Str::limit($battle->description, 120) }}
        </div>
        <div class="text-xs text-gray-500">
            {{ $battle->limit_date }}
            @if($battle->limit_date >= now()) En cours
            @else cloturée
            @endif
        </div>
    </a>
</div>
