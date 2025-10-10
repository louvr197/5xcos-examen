<x-app-layout>

    <div class="max-w-2xl mx-auto bg-white rounded shadow p-8 mt-8">
        <div class="mb-6 flex flex-col items-center">
            <x-meme-card :meme="$meme" />
        </div>
        <h2 class="font-bold text-xl text-blue-700 mb-2">{{ $meme->battle->title }}</h2>
        <p class="text-gray-700 mb-4">{{ $meme->battle->description }}</p>
        <p class="text-sm text-gray-500 mb-2">
            Posté par <span class="font-semibold">{{ $meme->poster->name  }}</span>
        </p>
        <div class="mt-4">
            <a href="{{ route('front.battles.show', $meme->battle) }}" class="text-blue-600 hover:underline">
                ← Retour à la battle
            </a>
        </div>
    </div>
</x-app-layout>
