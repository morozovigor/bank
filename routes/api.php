<?php


use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::prefix('users')->group(function () {
    Route::patch('{user}', [UserController::class, 'update']);
    Route::post('{user}/deposit', [TransactionController::class, 'deposit']);
});

Route::post('transfer', [TransactionController::class, 'transfer']);

Route::fallback(function () {
    return response()->json([
        'message' => 'Endpoint not found'
    ], Response::HTTP_NOT_FOUND);
});
