<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() 
    {
        // Render a list of a resource
        $articles = Article::latest()->get();

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show($articleId) 
    {
        // Show a single resource
        $article = Article::find($articleId);

        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create() {
        // Shows a view to create a new resource
    }

    public function store() {
        // Persist the new resource
    }

    public function edit() {
        // Show a view to edit an existing resource
    }

    public function update() {
        // Persist the edited resource
    }

    public function destroy() {
        // Delete a resource
    }


}