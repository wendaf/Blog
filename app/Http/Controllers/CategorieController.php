<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categorie::orderBy('created_at', 'desc')->paginate(5);

        return view('back.home_admin_category', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categorie::all();
        return view('back.handle_categorie_admin', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            if (empty($request['categorie']))
                return redirect()->back()->with("error", "Error name category, try again.");

            if (isset($request['media']) && !empty($request['media']))
            {
                $file = $request->file('media');
                $fileName = "category-" . $request['category']  . "." . $file->getClientOriginalExtension();
                $destinationPath = 'upload/';
                $request['media'] = $destinationPath . $fileName;
                $file->move($destinationPath, $fileName);
            }
            else
                $request['media'] = "/upload/background_login.jpeg";

            $new_categorie = new Categorie($request->all());
            $new_categorie->save();

            return redirect()->back()->with('success', 'Category created');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
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
        $category = Categorie::find($id);
        $categoryName = Categorie::all();
        return View('back.edit_categorie_admin', compact('category', 'categoryName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try
        {
            unset($request['_token']);
            $destinationPathThumb = '/upload/cover_thumb/';
            $destinationPathCover = '/upload/cover_category/';
            if (isset($request['media']) && !empty($request['media'])) {
                $file = $request->file('media');
                $fileNameCover = trim($request['id']) . '_' . time() . '_cover.' . $file->getClientOriginalExtension();
                $fileNameThumb = trim($request['id']) . '_' . time() . '_thumb.' . $file->getClientOriginalExtension();
                $file->move($destinationPathCover, $fileNameCover);

                $img_thumb = Image::make($destinationPathCover . $fileNameCover);
                $img_thumb->fit(120);
                $img_thumb->save($destinationPathThumb . $fileNameThumb, 100);

                $img_cover = Image::make($destinationPathCover . $fileNameCover);
                $img_cover->fit(1140, 380);
                $img_cover->save($destinationPathCover . $fileNameCover, 100);
                $request['media'] = $destinationPathCover . $fileNameCover;
            }
            else
                $request['media'] = "/assets/back_admin/img/background_login.jpeg";
            Categorie::find($request['id'])->update($request->all());
            return redirect()->back()->with('success', 'Category updated');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        try
        {
            $categorie->delete();
            return redirect()->back()->with('success','Category destroyed');
        }
        catch (\Throwable $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
