<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show()
    {
        $posts = Article::take(5)->get();
        $latest = Article::orderBy('created_at', 'desc')->take(5)->get();
        $cultures = Article::where('category_id', 10)->take(5)->get();
        $culture = Article::where('category_id', 10)->orderBy('created_at', 'desc')->take(5)->get();
        $business = Article::where('category_id', 9)->take(5)->get();
        $business1 = Article::where('category_id', 9)->orderBy('created_at', 'desc')->take(5)->get();
        
        return view('index', [
            'title' => 'Home',
            'posts' => $posts,
            'latest' => $latest,
            'cultures' => $cultures,
            'culture' => $culture,
            'business' => $business,
            'business1' => $business1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat artikel baru
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'required|image',
        ]);

        // Upload gambar
        $imagePath = $request->file('gambar')->store('articles', 'public');

        // Membuat artikel baru
        Article::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'category_id' => $request->category_id,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        // Menampilkan form untuk mengedit artikel
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'image',
        ]);

        // Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($article->gambar) {
                \Storage::delete('public/' . $article->gambar);
            }

            // Upload gambar baru
            $imagePath = $request->file('gambar')->store('articles', 'public');
            $article->gambar = $imagePath;
        }

        // Update artikel
        $article->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'category_id' => $request->category_id,
            'gambar' => $article->gambar,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Hapus gambar
        if ($article->gambar) {
            \Storage::delete('public/' . $article->gambar);
        }

        // Hapus artikel
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
