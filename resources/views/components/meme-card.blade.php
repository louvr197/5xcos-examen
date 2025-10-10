<div>
    <a class="flex flex-col h-full space-y-4 bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
        href="{{ route('front.memes.show', $meme) }}">
        <figure>
            <img src="{{ asset('storage/' . $meme->meme_path) }}" alt="{{ asset('storage/' . $meme->meme_path) }}">
        </figure>
        <div class="uppercase font-bold text-gray-800">
            <x-score-widget :meme="$meme" />
        </div>
        {{-- <div class="flex-grow text-gray-700 text-sm text-justify">
            {{ Str::limit($battle->description, 120) }}
        </div>
        <div class="text-xs text-gray-500">
            {{ $battle->limit_date }}
        </div>--}}
    </a>
</div>
