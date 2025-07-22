<!-- Fichier: resources/views/admin/categories/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Formulaire de création -->
                    <form action="{{ route('admin.categories.store') }}" method="POST" class="mb-6">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom de la catégorie:</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Créer la catégorie
                        </button>
                    </form>

                    <!-- Affichage message de succès -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Liste des catégories existantes -->
                    <h3 class="text-lg font-semibold mb-4">Catégories existantes</h3>
                    <ul class="list-disc pl-5">
                        @forelse ($categories as $category)
                            <li>{{ $category->name }}</li>
                        @empty
                            <li>Aucune catégorie pour le moment.</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>