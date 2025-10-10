<div>
    <form method="POST" action="{{ route('memes.store', $battle) }}" enctype="multipart/form-data" class="mb-6">
        @csrf
        <input type="file" name="meme_path" required class="">
        <div class="flex justify-end mt-4">
            <button type="submit"
                class="btn btn-primary bg-blue-600 text-white hover:bg-blue-700 px-2 py-2  rounded-md
        ">
                Ajouter un mème
            </button>
        </div>
    </form>

</div>
