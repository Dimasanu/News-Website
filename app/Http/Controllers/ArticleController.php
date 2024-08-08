<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function indexs()
    {
        $posts = Article::take(5)->get();
        $latest = Article::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::with('articles')->take(5)->get(); // Ambil semua kategori beserta artikel terkait
        
        return view('index', [
            'title' => 'Home',
            'posts' => $posts,
            'latest' => $latest,
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('single-post', [
            'title' => $article->judul,
            'article' => $article,
        ]);
        
    }

    public function showc($id)
    {
        $category = category::findOrFail($id);
        $articles = Article::where('category_id', $id)->paginate(5);
        
        return view('category', [
            'title' => $category->name,
            'articles' => $articles,
            'category' => $category,
        ]);
        
    }

    public function showAllCategories()
    {
        $articles = Article::paginate(5); // Menampilkan semua artikel dengan pagination

        return view('category', [
            'title' => 'All Categories',
            'articles' => $articles,
            'category' => null,
        ]);
    }

    public function index()
    {
        $articledb = Article::all();
        $categories = Category::all();
        return view('admin.articledb', compact('articledb', 'categories'));
    }


    public function store(Request $request){$request->validate(['judul' => 'required','penulis' => 'required','isi' => 'required','category_id' => 'required','gambar' => 'required']);

            Article::create($request->all());

            return redirect()->route('articledb.index')
                            ->with('success', 'Article created successfully.');
        }

    public function update(Request $request, $id){$request->validate(['judul' => 'required','penulis' => 'required','isi' => 'required','category_id' => 'required','gambar' => 'required']);

            $article = Article::findOrFail($id);
            $article->update($request->all());

            return redirect()->route('articledb.index')
                            ->with('success', 'Article updated successfully.');
        }

    public function destroy($id){$article = Article::findOrFail($id);$article->delete();

            return redirect()->route('articledb.index')
                            ->with('success', 'Article deleted successfully.');
        }
}
