<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function index() 
    {
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;

        } else {
            // Render a list of a resource
            $articles = Article::latest()->get();
        }

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article) 
    {
        // Show a single resource
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create() {
        // Shows a view to create a new resource
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validateArticle($request);
        
        $article = new Article(request(['title', 'body', 'excerpt']));    
        $article->user_id = 2;   // currently hardcoded
        $article->save();
        
        $article->tags()->attach(request('tags')); 

        return redirect('/articles');
    }

    public function edit(Article $article) {
        // Show a view to edit an existing resource
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article) {
        // Persist the edited resource
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    public function destroy() {
        // Delete a resource
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'excerpt' => ['required',],
            'body' => ['required',],
            'tags' => 'exists:tags,id'
        ]);
    }


}
