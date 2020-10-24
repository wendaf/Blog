<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;

class EditProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $article = Article::all();
        $fifthArticle = Article::orderBy('created_at', 'desc')->paginate(5);
        $popularArticle = Article::orderBy('like', 'desc')->paginate(4);
        $fifthCategory = Categorie::orderBy('created_at', 'asc')->paginate(4);
        $lastArticle = Article::all()->first();
        $category = Categorie::all();
        return view('front.edit_profil', compact('article', 'popularArticle', 'lastArticle', 'category', 'fifthArticle', 'fifthCategory'));
    }
}
