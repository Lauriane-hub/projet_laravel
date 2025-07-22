<!-- Fichier: resources/views/admin/stands/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Stands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))
                        <div class="bg-green-100 border-green-400 text-green-700 border px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nom du Stand</th>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Exposant</th>
                                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Catégorie</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Statut</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($stands as $stand)
                                    <tr class="border-b">
                                        <td class="w-1/4 text-left py-3 px-4">{{ $stand->name }}</td>
                                        <td class="w-1/4 text-left py-3 px-4">{{ $stand->user->name }}</td>
                                        <td class="w-1/4 text-left py-3 px-4">{{ $stand->category->name }}</td>
                                        <td class="text-left py-3 px-4">
                                            <span class="
                                                @if($stand->status == 'en_attente') bg-yellow-200 text-yellow-800 @endif
                                                @if($stand->status == 'approuve') bg-green-200 text-green-800 @endif
                                                @if($stand->status == 'rejete') bg-red-200 text-red-800 @endif
                                                py-1 px-3 rounded-full text-xs">
                                                {{ str_replace('_', ' ', $stand->status) }}
                                            </span>
                                        </td>
                                        <td class="text-left py-3 px-4">
                                            @if($stand->status == 'en_attente')
                                                <!-- Formulaire pour Approuver -->
                                                <form action="{{ route('admin.stands.update', $stand) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approuve">
                                                    <button type="submit" class="text-green-500 hover:text-green-700 font-bold">Approuver</button>
                                                </form>
                                                <span class="mx-2">|</span>
                                                <!-- Formulaire pour Rejeter -->
                                                <form action="{{ route('admin.stands.update', $stand) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejete">
                                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Rejeter</button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">Aucun stand n'a été soumis pour le moment.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>