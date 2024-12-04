<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::get("ressources", [RessourceController::class, "index"]);
 Route::post("ressources", [RessourceController::class, "store"]);
 Route::get("ressources/{id}", [RessourceController::class, "show"]);
 Route::delete('ressources/{id}', [RessourceController::class, 'destroy']);
 Route::put('ressources/{id}', [RessourceController::class, 'update']);

 Route::get("schools", [SchoolController::class, "index"]);
 Route::post("schools", [SchoolController::class, "store"]);
 Route::get("schools/{id}", [SchoolController::class, "show"]);
 Route::delete('schools/{id}', [SchoolController::class, 'destroy']);
 Route::put('schools/{id}', [SchoolController::class, 'update']);

 Route::get("events", [EventController::class, "index"]);
 Route::post("events", [EventController::class, "store"]);
 Route::get("events/{id}", [EventController::class, "show"]);
 Route::delete('events/{id}', [EventController::class, 'destroy']);
 Route::put('events/{id}', [EventController::class, 'update']);

 Route::get("discussions", [DiscussionController::class, "index"]);
 Route::post("discussions", [DiscussionController::class, "store"]);
 Route::get("discussions/{id}", [DiscussionController::class, "show"]);
 Route::delete('discussions/{id}', [DiscussionController::class, 'destroy']);
 Route::put('discussions/{id}', [DiscussionController::class, 'update']);

 Route::get("messages", [MessageController::class, "index"]);
 Route::post("messages", [MessageController::class, "store"]);
 Route::get("messages/{id}", [MessageController::class, "show"]);
 Route::delete('messages/{id}', [MessageController::class, 'destroy']);
 Route::put('messages/{id}', [MessageController::class, 'update']);

 Route::get("users", [UserController::class, "index"]);
 Route::post("users", [UserController::class, "store"]);
 Route::get("users/{id}", [UserController::class, "show"]);
 Route::delete('users/{id}', [UserController::class, 'destroy']);
 Route::put('users/{id}', [UserController::class, 'update']);