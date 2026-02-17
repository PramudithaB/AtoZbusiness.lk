<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->get('/lessons/user', [LessonController::class, 'paidLessons']);

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index']);  // ✅ Add this
Route::post('/payments/{id}/approve', [PaymentController::class, 'approve']);
Route::post('/payments/{id}/reject', [PaymentController::class, 'reject']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments/{id}/status', [PaymentController::class, 'updateStatus']);


// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    
    // Super Admin only routes
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/super-admin/dashboard', function () {
            return response()->json(['message' => 'Super Admin Dashboard']);
        });
    });
    
    // Admin and Super Admin routes
    Route::middleware('role:admin,super_admin')->group(function () {
        Route::get('/admin/dashboard', function () {
            return response()->json(['message' => 'Admin Dashboard']);
        });
    });
    
    // Teacher routes
    Route::middleware('role:teacher')->group(function () {
        Route::get('/teacher/dashboard', function () {
            return response()->json(['message' => 'Teacher Dashboard']);
        });
    });
    
    // Student routes
    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', function () {
            return response()->json(['message' => 'Student Dashboard']);
        });
    });
});
Route::apiResource('classes', ClassRoomController::class);
Route::put('/classes/{id}', [ClassRoomController::class, 'update']);
Route::get('/classes', [ClassRoomController::class, 'index']);
Route::post('/lessons', [LessonController::class, 'store']);
Route::get('/lessons', [LessonController::class, 'index']);
Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);
Route::put('/lessons/{id}', [LessonController::class, 'update']);
// routes/api.php
Route::get('/packages', [PackageController::class, 'index']);
Route::post('/packages', [PackageController::class, 'store']);
Route::put('/packages/{id}', [PackageController::class, 'update']);
Route::delete('/packages/{id}', [PackageController::class, 'destroy']);
Route::get('/classes/{classId}/lessons', [LessonController::class, 'byClass']);

