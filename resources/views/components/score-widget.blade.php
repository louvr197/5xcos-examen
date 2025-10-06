<div>
    <!-- He who is contented is rich. - Laozi -->
    <x-score-star :meme="$meme" :current-score="$meme->score()" />
    <span class="text-gray-600  ">({{ count($meme->votes) }} votes)</span>
</div>
