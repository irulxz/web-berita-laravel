<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ ROOT
Route::get('/', function () {
    return auth()->check()
        ? redirect('/admin/dashboard')
        : redirect('/login');
});

// Halaman umum
Route::get('/beranda', function () {
    return view('user.beranda');
});

Route::get('/tentang', function () {
    return view('user.tentang');
});

// Auth Breeze
require __DIR__.'/auth.php';

// 🔐 ADMIN
Route::middleware(['auth'])->group(function () {

    // ✅ DASHBOARD REAL DATA + CHART
    Route::get('/admin/dashboard', function () {

        // CARD DATA
        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalCategories = Category::count();

        // 🔥 PIE CHART (artikel per kategori)
        $categoryData = Category::withCount('articles')->get();

        // 🔥 AREA CHART (artikel per bulan)
        $articlePerMonth = Article::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('month')
        ->pluck('total', 'month');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalArticles',
            'totalCategories',
            'categoryData',
            'articlePerMonth'
        ));

    })->name('admin.dashboard');

    // CRUD
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);

});