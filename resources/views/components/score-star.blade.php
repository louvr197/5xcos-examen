@props(['meme', 'currentScore' => 0])

@php
    // --- Logique d'affichage (Basée sur l'AVG Score) ---
    $displayScore = max(0, min(5, (float) $currentScore));
    $fullStars = floor($displayScore);
    $maxStars = 5;

    // NOTE: Pour simplifier le mélange entre vote (entier) et affichage (float),
    // nous n'utiliserons pas la demi-étoile cliquable. Les étoiles sont pleines ou vides
    // en fonction de l'arrondi (floor) de la note moyenne.
@endphp

<div class="star-rating flex items-center" title="Moyenne: {{ number_format($displayScore, 1) }} / 5">

    {{-- Le formulaire enveloppe TOUS les boutons, rendant tout le widget votable --}}
    <form method="POST" action="{{ route('votes.store') }}" class="rating-form flex items-center">
        @csrf
        <input type="hidden" name="meme_id" value="{{ $meme->id }}">

        @for ($score = 1; $score <= $maxStars; $score++)

            @php
                // Détermine la couleur de l'étoile en fonction de l'AVG score actuel.
                // Si le score de la boucle ($score) est inférieur ou égal au nombre d'étoiles pleines, elle est colorée.
                $isFilled = $score <= $fullStars;

                // Si l'utilisateur n'a pas encore voté, la couleur est la couleur de la moyenne.
                // On utilise la classe text-yellow-500 pour les étoiles pleines de la moyenne.
                $iconClass = $isFilled
                            ? 'text-yellow-500 hover:text-yellow-600' // Couleur de la moyenne
                            : 'text-gray-400 hover:text-yellow-500'; // Couleur vide et hover pour le vote
            @endphp

            <button
                type="submit"
                name="score"
                value="{{ $score }}"
                class="star-btn p-1 focus:outline-none bg-transparent border-none cursor-pointer"
                title="Donner la note de {{ $score }}"
            >
                {{-- L'icône affichée est toujours l'icône pleine (solid) ou l'outline. --}}
                @if ($isFilled)
                    <x-heroicon-s-star class="w-6 h-6 fill-current {{ $iconClass }}" style="display: block;" />
                @else
                    <x-heroicon-o-star class="w-6 h-6 {{ $iconClass }}" style="display: block;" />
                @endif

            </button>
        @endfor
    </form>


    {{-- Affichage de la note numérique --}}
    <span class="ml-2 text-sm text-gray-600">({{ number_format($displayScore, 1) }}/5)</span>
</div>
