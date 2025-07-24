@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Produits</h1>

    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($produits->isEmpty())
        <p>Vous n'avez aucun produit pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix (€)</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ number_format($produit->prix, 2, ',', ' ') }}</td>
                    <td>
                        @if($produit->image_url)
                            <img src="{{ asset('storage/' . $produit->image_url) }}" alt="{{ $produit->nom }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produits.edit', $produit) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
