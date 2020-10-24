<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ( $request->get("password") &&  $request->get("password") ==  $request->get("conf_password") )
        {
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();

        return back();
    }
}
