<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        // Eager loading relasi
        $articles = Article::with(['category', 'user'])->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return redirect()->route('categories.create')
                ->with('info', 'Silakan buat kategori terlebih dahulu sebelum menulis berita.');
        }

        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:10|max:255', // 🔥 FIX DI SINI
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.min' => 'Judul minimal 10 karakter',
            'category_id.required' => 'Kategori wajib dipilih',
            'content.required' => 'Isi berita wajib diisi',
        ]);

        Article::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|min:10|max:255', // 🔥 FIX JUGA DI SINI
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.min' => 'Judul minimal 10 karakter',
        ]);

        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . $article->id,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}