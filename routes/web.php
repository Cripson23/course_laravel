<?php

    use App\Http\Controllers\Web\Auth\RegisterController;
    use App\Http\Controllers\Web\Auth\SessionsController;
    use App\Http\Controllers\Web\BrandsController;
    use App\Http\Controllers\Web\CarsController;
    use App\Http\Controllers\Web\CommentsController;
    use App\Http\Controllers\Web\CountriesController;
    use App\Http\Controllers\Web\PostsController;
    use App\Http\Controllers\Web\Public\CarsController as PublicCarsController;
    use App\Http\Controllers\Web\TagsController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

/*Route::get('/cars', [ CarsController::class, 'index' ])->name('cars.index');
Route::get('/cars/create', [ CarsController::class, 'create' ]);
Route::get('/cars/{car}/edit', [ CarsController::class, 'edit' ])->name('cars.edit');
Route::get('/cars/{car}', [ CarsController::class, 'show' ])->name('cars.show');
Route::post('/cars', [ CarsController::class, 'store' ])->name('cars.store');
Route::put('/cars/{car}', [ CarsController::class, 'update' ])->name('cars.update');
Route::delete('/cars/{car}', [ CarsController::class, 'destroy' ])->name('cars.destroy');*/

Route::prefix('/auth')->group(function(){
    Route::middleware('guest')->group(function () {
        Route::controller(RegisterController::class)->group(function () {
            Route::get('/register', 'create')->name('auth.register.create');
            Route::post('/register', 'store')->name('auth.register.store');
        });
        Route::controller(SessionsController::class)->group(function () {
            Route::get('/login', 'create')->name('auth.sessions.create');
            Route::post('/login', 'store')->name('auth.sessions.store');
        });
    });
    Route::middleware('auth')->group(function () {
        Route::controller(SessionsController::class)->group(function () {
            Route::delete('/login', 'destroy')->name('auth.sessions.destroy');
        });
    });
});

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function() {
    Route::get('/posts', [ PostsController::class, 'index' ])->name('posts.index');
    Route::get('/posts/create', [ PostsController::class, 'create' ])->name('posts.create');
    Route::get('/posts/{post}', [ PostsController::class, 'show' ])->name('posts.show');
    Route::post('/posts', [ PostsController::class, 'store' ])->name('posts.store');

    Route::middleware([])->group(function () {
        Route::resource('cars', CarsController::class)->whereNumber('car');//->only()->except();
        Route::get('/cars/trashed', [CarsController::class, 'trashed'])->name('cars.trashed');
        Route::put('/cars/{id}/restore', [CarsController::class, 'restore'])->name('cars.restore');
        Route::delete('/cars/{id}/delete', [CarsController::class, 'delete'])->name('cars.delete');
    });

    Route::resource('brands', BrandsController::class)->whereNumber('brand');
    Route::resource('countries', CountriesController::class)->except(['show'])->whereNumber('country');
    Route::resource('tags', TagsController::class)->except(['show'])->whereNumber('tag');

    Route::post('/comments', [ CommentsController::class, 'store' ])->name('comments.store');
});

Route::get('/', [ PublicCarsController::class, 'index' ])->name('home');

Route::fallback(function () {
    abort(404);
});
