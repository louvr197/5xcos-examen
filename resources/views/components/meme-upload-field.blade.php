<div>
   <form method="POST" action="{{ route('memes.store', $battle) }}" enctype="multipart/form-data" class="mb-6">
        @csrf
        <input type="file" name="meme_path" required>
        <button type="submit" class="btn btn-primary">Ajouter un mème</button>
    </form>

</div>
