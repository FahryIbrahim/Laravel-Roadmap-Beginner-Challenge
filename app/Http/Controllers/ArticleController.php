<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $articleHero = Article::with('user', 'category', 'tags')->inRandomOrder()->first();
        $articles = Article::with('user', 'category', 'tags')->inRandomOrder()->take(3)->get();
        $trendingArticles = Article::with('user', 'category', 'tags')->inRandomOrder()->take(3)->get();
        // Check if the article exists
        if ($articleHero) {
            // Strip HTML tags and count words in the content
            $wordCount = str_word_count(strip_tags($articleHero->content));

            // Calculate estimated reading time based on 200 words per minute
            $readingTime = ceil($wordCount / 200);

            // Assign the calculated reading time to the articleHero dynamically
            $articleHero->reading_time = $readingTime;

            $articleHero->content = Str::limit($articleHero->content, 200);
        }
        return view('pages.home', compact('articleHero', 'articles', 'trendingArticles'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::with('user', 'category', 'tags')->get();
        return view('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|string|unique:article,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reading_time' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $path = $request->file('image') ? $request->file('image')->store('posts_images', 'public') : null;

        // Associate the article with the currently authenticated user
        $post = Auth::user()->article()->create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'image' => $path,
            'reading_time' => $request->reading_time,
            'category_id' => $request->category_id
        ]);

        $post->tags()->sync($request->tags);

        return back()->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('modify', $article);

        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('modify', $article);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|string|unique:article,slug,' . $article->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reading_time' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ]);

        $path = $article->image;
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image); // Delete the old image if exists
            }
            $path = $request->file('image')->store('posts_images', 'public'); // Upload the new image
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'image' => $path,
            'reading_time' => $request->reading_time,
            'category_id' => $request->category_id
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('modify', $article);

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return back()->with('success', 'Article deleted successfully');
    }
}
