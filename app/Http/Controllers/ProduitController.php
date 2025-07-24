use App\Http\Controllers\ProduitController;

Route::middleware(['auth', 'role:entrepreneur_approuve'])->group(function () {
    Route::resource('produits', ProduitController::class);
});
