<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function api(){
        $arr = Article::all();
        return response($arr,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        // $articles = Article::all();

        // return view('article.create',compact('articles','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $articles = Article::with('category')->get();
        // $articles = Article::all();
        // return $articles;

        return view('article.create',compact('articles','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required','min:3',
            'category_id' => "required",
            'description' => 'required','min:10','max:300'
        ]);
        $categories = Category::all();
        $articles = Article::all();
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('article.create',compact('articles','categories'))->with('status','Successfully Created Article.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $articles = Article::all();

        return view('article.edit',compact('article','articles','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $categories = Category::all();
        $articles = Article::all();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->description = $request->description;
        $article->update();

        return redirect()->route('article.create',compact('articles','categories'))->with('update','Successfully Updated Article.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('delete','Successfully Deleted Article.');
    }
}
