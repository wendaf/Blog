<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use Illuminate\Http\Request;
use Image;

class ArticleController extends Controller
{
    public function __construct()
    {
        //ini_set('display_errors', 'on');
        //ini_set('memory_limit', '256M');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('created_at', 'desc')->paginate(5);
        $likes = AdminController::get_count_likes();
        return view('back.home_admin_article', compact('article', 'likes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categorie::all();
        return view('back.handle_article_admin', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Ilworluminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $destinationPathThumb = 'upload/cover_thumb/';
            $destinationPathCover = 'upload/cover_article/';
            if (isset($request['media']) && !empty($request['media'])) {
                $file = $request->file('media');
                $fileNameCover = trim($request['title']) . '_' . time() . '_cover.' . $file->getClientOriginalExtension();
                $fileNameThumb = trim($request['title']) . '_' . time() . '_thumb.' . $file->getClientOriginalExtension();
                $file->move($destinationPathCover, $fileNameCover);

                $img_thumb = Image::make($destinationPathCover . $fileNameCover);
                $img_thumb->fit(120);
                $img_thumb->save($destinationPathThumb . $fileNameThumb, 100);

                $img_cover = Image::make($destinationPathCover . $fileNameCover);
                $img_cover->fit(1140, 380);
                $img_cover->save($destinationPathCover . $fileNameCover, 100);
                $request['media'] = $destinationPathCover . $fileNameCover;
            }

            $article = new Article($request->all());
            if (isset($request['media']) && !empty($request['media'])) {
                $article->setMedia($destinationPathCover . $fileNameCover);
                $article->media = $destinationPathCover . $fileNameCover;
            }
            else
                $article->media = "/assets/back_admin/img/background_login.jpeg";

            $article->save();

            return redirect()->back()->with('success', 'Article created');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $category = Categorie::all();
        return View('back.edit_article_admin', compact('article', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try
        {
            unset($request['_token']);
            $data = $request->all();
            $destinationPathThumb = 'upload/cover_thumb/';
            $destinationPathCover = 'upload/cover_article/';
            DebugBar()->alert(': Upload ~ 0 :');
            if (isset($request['media']) && !empty($request['media'])) {
                DebugBar()->alert(': Upload ~ 1 :');
                $file = $request->file('media');
                $fileNameCover = trim($request['id']) . '_' . time() . '_cover.' . $file->getClientOriginalExtension();
                $fileNameThumb = trim($request['id']) . '_' . time() . '_thumb.' . $file->getClientOriginalExtension();
                $file->move($destinationPathCover, $fileNameCover);
                DebugBar()->alert(': Upload ~ 2 :');
                $img_thumb = Image::make($destinationPathCover . $fileNameCover);
                $img_thumb->fit(120);
                $img_thumb->save($destinationPathThumb . $fileNameThumb, 100);
                DebugBar()->alert(': Upload ~ 3 :');
                $img_cover = Image::make($destinationPathCover . $fileNameCover);
                $img_cover->fit(1140, 380);
                $img_cover->save($destinationPathCover . $fileNameCover, 100);
                $data['media'] = $destinationPathCover . $fileNameCover;
                DebugBar()->alert(': Upload ~ 4 :');
            }
            else
                $data['media'] = "/assets/back_admin/img/background_login.jpeg";
            DebugBar()->alert(': Upload ~ 5 :');
            Article::find($data['id'])->update($data);
            DebugBar()->alert(': Upload ~ 6 :');
            return redirect()->back()->with('success', 'Article updated');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try
        {
            $article->delete();
            return redirect()->back()->with('success','Article destroyed');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
