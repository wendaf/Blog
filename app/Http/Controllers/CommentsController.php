<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => request('id'),
            'body' => request('body')
        ]);

        return back();
    }
}
