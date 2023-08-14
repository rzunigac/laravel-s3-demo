<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FileUploadController::class, 'uploadForm']);
Route::get('/upload', [FileUploadController::class, 'uploadForm']);
Route::post('/upload', [FileUploadController::class, 'uploadPost'])->name('file.upload.post');
Route::get('/list-files', [FileUploadController::class, 'listFiles']);

Route::get('/get-signed-url/{filename}', [FileUploadController::class, 'getSignedUrl'])
    ->where('filename', '.*')
    ->name('signed-url');