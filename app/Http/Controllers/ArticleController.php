<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Function to display the home page with articles and categories
    public function indexs()
    {
        $posts = Article::take(5)->get();  // Get 5 articles for the main post section
        $latest = Article::orderBy('created_at', 'desc')->take(5)->get();  // Get 5 latest articles
        $categories = Category::with('articles')->take(5)->get();  // Get all categories with related articles

        return view('index', [
            'title' => 'Home',
            'posts' => $posts,
            'latest' => $latest,
            'categories' => $categories,
        ]);
    }

    // Function to display a single article
    public function show($id)
    {
        $article = Article::findOrFail($id);  // Find the article by its ID or throw 404
        return view('single-post', [
            'title' => $article->judul,
            'article' => $article,
        ]);
    }

    // Function to display all articles in a specific category
    public function showc($id)
    {
        $category = Category::findOrFail($id);  // Find the category by its ID or throw 404
        $articles = Article::where('category_id', $id)->paginate(5);  // Paginate articles in the category
        
        return view('category', [
            'title' => $category->name,
            'articles' => $articles,
            'category' => $category,
        ]);
    }

    // Function to display all categories and their articles
    public function showAllCategories()
    {
        $articles = Article::paginate(5);  // Paginate all articles

        return view('category', [
            'title' => 'All Categories',
            'articles' => $articles,
            'category' => null,
        ]);
    }

    // Function to display the admin page for articles
    public function index(Request $request)
    {
        $articles = Article::all();
        $categories = Category::all();
        $editArticle = null;

        if ($request->has('edit')) {
            $editArticle = Article::findOrFail($request->edit);
        }

        return view('admin.articledb', compact('articles', 'categories', 'editArticle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'required|string',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article added successfully.');
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'required|string',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
