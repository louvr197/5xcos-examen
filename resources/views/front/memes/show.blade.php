<x-app-layout>

    <x-meme-card :meme="$meme"></x-meme-card>
    <h2>{{$meme->battle->title}}</h2>
    <p>{{ $meme->battle->description }}</p>
    <p> posté par {{ isset($meme->poster->name)?$meme->poster->name:"inconnu" }}</p>
</x-app-layout>
