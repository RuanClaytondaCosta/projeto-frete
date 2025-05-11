<?php

use Illuminate\Support\Facades\Route;
use App\Models\Frete;



use App\Http\Controllers\FreteController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/formulario', [FreteController::class, 'create'])->name('frete.formulario');
Route::post('/frete', [FreteController::class, 'store'])->name('frete.store');
Route::get('/fretes/create', [FreteController::class, 'create'])->name('fretes.create');



Route::get('/', function () {
    return view('welcome');
});




// Route::get('/formulario', function () {
//     return view('formulario');
// });


Route::get('/fretes', function(){
    $fretes = Frete::all();
    return view('fretes.index', compact('fretes'));
});


Route::get('/fretes/{id}', function($id){
    $frete = Frete::findOrFail($id);
    return view('fretes.show', compact('frete'));
});

Route::resource('fretes', FreteController::class);


Route::get('/fretes/{frete}/edit', [FreteController::class, 'edit'])->name('fretes.edit');
Route::put('/fretes/{frete}', [FreteController::class, 'update'])->name('fretes.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/fretes/create', [FreteController::class, 'create'])->name('fretes.create');
    Route::post('/fretes', [FreteController::class, 'store'])->name('frete.store');
    Route::get('/fretes', [FreteController::class, 'index'])->name('fretes.index');
    Route::get('/relatorios', [FreteController::class, 'relatorio'])->name('fretes.relatorio');
});

Route::get('/relatorios/pdf', [FreteController::class, 'exportarPdf'])->name('fretes.exportar_pdf');




Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard'); // Crie o arquivo resources/views/dashboard.blade.php se quiser
})->middleware(['auth'])->name('dashboard');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


require __DIR__.'/auth.php';


