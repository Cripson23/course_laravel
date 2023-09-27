<?php

    use App\Http\Controllers\Api\Auth\SessionsController;
    use App\Http\Controllers\Api\CarsController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*Route::prefix('/auth')->group(function() {
    Route::middleware('guest')->group(function () {
        Route::get('login', [ SessionsController::class, 'login' ]);
        Route::get('logout', 'SessionsController@logout');
        Route::get('token', 'SessionsController@token');
        Route::get('me', 'SessionsController@me');
        Route::get('tokenid', 'SessionsController@tokenId');
    });
});*/

/*Route::prefix('/admin')->group(function () {
    Route::middleware(['jwt.auth'])->group(function () {
        Route::resource('cars', CarsController::class)->whereNumber('car');
    });
});*/
