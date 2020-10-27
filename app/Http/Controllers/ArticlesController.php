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
        return view('articles.create');
    }

    public function store() {
        // Persist the new resource

        request()->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'excerpt' => ['required',],
            'body' => ['required',]
        ]);

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');

    }

    public function edit($articleId) {
        // Show a view to edit an existing resource
        $article = Article::find($articleId);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update($articleId) {

        request()->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'excerpt' => ['required',],
            'body' => ['required',]
        ]);
                
        // Persist the edited resource
        $article = Article::find($articleId);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy() {
        // Delete a resource
    }


}
