<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Article;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = DB::table('articles')->latest()->get();
        return view('articles.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string|max:255',
        // ]);

        // $article = article::create([
        //     'name' => $request['name'],
        //     'description' => $request['description'],
        // ]);
        // return redirect()->route('articles.index', $article);
        $data = Article::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'metadesc' => $request['metadesc'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
        ]);

        $article = DB::table('articles')->get();

        return view('articles.index', compact('article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = DB::table('articles')->find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = DB::table('articles')->find($id);
        
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('articles')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'title' => $request->title,
            'metadesc' => $request->metadesc,
            'keywords' => $request->keywords,
            'description' => $request->description,
        ]);
        
        return redirect(route('articles.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = DB::table('articles')->delete($id);
        return redirect(route('articles.index'));
    }
}
