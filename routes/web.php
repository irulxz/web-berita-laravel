<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;

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
        ? redirect()->route('admin.dashboard')
        : redirect('/login');
});


// ========================
// 🌐 HALAMAN PUBLIK
// ========================
Route::get('/beranda', function () {
    return view('user.beranda');
});

Route::get('/tentang', function () {
    return view('user.tentang');
});

// 🔥 DETAIL BERITA (TUGAS MANDIRI)
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('berita.show');


// ========================
// 🔐 AUTH (BREEZE)
// ========================
require __DIR__.'/auth.php';


// ========================
// 🔐 ADMIN
// ========================
Route::middleware(['auth'])->group(function () {

    // ✅ DASHBOARD
    Route::get('/admin/dashboard', function () {

        $totalUsers = User::count();
        $totalArticles = Article::count();
        $totalCategories = Category::count();

        // PIE CHART
        $categoryData = Category::withCount('articles')->get();

        // AREA CHART
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


    // ========================
    // 📦 CRUD
    // ========================
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/articles', ArticleController::class);
    Route::resource('/admin/tags', TagController::class);


    // ========================
    // 👤 PROFILE (ONE TO ONE)
    // ========================
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');

});