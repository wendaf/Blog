<?php

namespace App\Http\Controllers;

use App\Article;
use App\Categorie;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    private $article;
    private $categorie;

    public function __construct()
    {
        $this->middleware('admin');
        $this->article = new ArticleController();
        $this->categorie = new CategorieController();

    }

    public function index()
    {
        return ($this->article->index());
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index_category()
    {
        return ($this->categorie->index());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_user()
    {

        $user = User::paginate(5);
        return view('back.home_admin_user', compact('user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add_article()
    {
        return ($this->article->create());
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function add_category()
    {
        return ($this->categorie->create());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create_new_article(Request $request)
    {
        return ($this->article->store($request));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create_new_category(Request $request)
    {
        return ($this->categorie->store($request));
    }


    public function edit_article($id)
    {
        return ($this->article->edit($id));
    }

    public function edit_category($id)
    {
        return ($this->categorie->edit($id));
    }

    public function update_article(Request $request)
    {
        return ($this->article->update($request));
    }

    public function update_category(Request $request)
    {
        return ($this->categorie->update($request));

    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete_article($id)
    {
        $article = Article::find($id);
        return ($this->article->destroy($article));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function delete_category($id)
    {
        $categorie = Categorie::find($id);
        return ($this->categorie->destroy($categorie));
    }

    /**
     * @return int
     */
    public static function get_count_likes() : int
    {
        $article = Article::all();
        $countLike = 0;

        foreach ($article as $key => $data)
            $countLike += intval($data['like']);
        return ($countLike);
    }
}
