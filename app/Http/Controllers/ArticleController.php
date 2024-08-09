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
    public function index()
    {
        $articledb = Article::all();  // Get all articles
        $categories = Category::all();  // Get all categories
        return view('admin.articledb', compact('articledb', 'categories'));
    }

    // Function to store a new article
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'category_id' => 'required',
            'gambar' => 'required',
        ]);

        Article::create($request->all());  // Create a new article with the request data

        return redirect()->route('articledb.index')
                        ->with('success', 'Article created successfully.');
    }

    // Function to update an existing article
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'category_id' => 'required',
            'gambar' => 'required',
        ]);

        $article = Article::findOrFail($id);  // Find the article by its ID or throw 404
        $article->update($request->all());  // Update the article with the request data

        return redirect()->route('articledb.index')
                        ->with('success', 'Article updated successfully.');
    }

    // Function to delete an existing article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);  // Find the article by its ID or throw 404
        $article->delete();  // Delete the article

        return redirect()->route('articledb.index')
                        ->with('success', 'Article deleted successfully.');
    }
}
