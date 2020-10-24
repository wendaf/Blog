<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Article $article)
    {
        $article = Article::all();
        $fifthArticle = Article::orderBy('created_at', 'desc')->paginate(5);
        $popularArticle = Article::orderBy('like', 'desc')->paginate(4);
        $fifthCategory = Categorie::orderBy('created_at', 'asc')->paginate(4);
        $lastArticle = Article::all()->first();
        $category = Categorie::all();
        return view('front.contact', compact('article', 'popularArticle', 'lastArticle', 'category', 'fifthArticle', 'fifthCategory'));
    }
    public function send(Request $request)
    {
        $input = $request->all();

        Mail::to('charlesbeasse1@gmai.com')->send(new ContactNotification($input)); 

        return 'Votre message a bien ete envoyer';

    }
}
