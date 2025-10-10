<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Créer une battle
                </div>
            </div>

                    <form method="POST" action="{{ route('battles.store') }}">
            @csrf
            <x-input-label for="title" value="Titre" />
            <x-text-input id="title" name="title" type="text" class="mb-4" required />
            <x-input-label for="description" value="Description" />
            <textarea id="description" name="description" class="mb-4 w-full"></textarea>
            <x-input-label for="limit_date" value="Date limite" />
            <x-text-input id="limit_date" name="limit_date" type="date" class="mb-4" required />
            <x-primary-button>Créer la battle</x-primary-button>
        </form>
        </div>
    </div>
</x-app-layout>
