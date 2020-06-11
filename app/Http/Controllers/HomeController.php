<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        $fifthArticle = Article::orderBy('created_at', 'desc')->paginate(5);
        $popularArticle = Article::orderBy('like', 'desc')->paginate(4);
        $fifthCategory = Categorie::orderBy('created_at', 'asc')->paginate(4);
        $lastArticle = Article::all()->first();
        $category = Categorie::all();
        return view('front.home', compact('article', 'popularArticle', 'lastArticle', 'category', 'fifthArticle', 'fifthCategory'));
    }

    /**
     *
     */
    public function get_article_content($id)
    {
        $myArticle = Article::where('id', $id)->firstOrFail();
        $fifthCategory = Categorie::orderBy('created_at', 'asc')->paginate(4);
        $category = Categorie::all();
        return View('front.article_content', compact('myArticle', 'fifthCategory', 'category'));
    }

    public function get_category_content($id)
    {
        $categorie = Categorie::where('id', $id)->firstOrFail();
        $allArticle = Article::where('categorie', $categorie->name)->paginate(5);
        $fifthCategory = Categorie::orderBy('created_at', 'asc')->paginate(4);
        $category = Categorie::all();
        return View('front.category_content', compact('allArticle', 'fifthCategory', 'category'));
    }

    public function send_like($id)
    {
        $article = Article::find($id);
        $article->like += 1;
        $article->save();
        return response()->json(["success", $article->like]);
    }
}
