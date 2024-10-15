<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload',[App\Http\Controllers\FileUploadController::class,'showUploadForm']);
Route::post('/upload_file',[App\Http\Controllers\FileUploadController::class,'storeUpload'])->name('file.uploads');