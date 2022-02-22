<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categories;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        // $categories = Categories::where('is_active', 1)->orderBy('id', 'desc')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::where('parent_id', null)->get();
        $category2 = Categories::where('parent_id', !null)->get();
        return view('categories.create', compact('category', 'category2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try
        // {
        //     $data = Categories::create([
        //         'name' => $request['name'],
        //         'description' => $request['description'],
        //     ]);

        //     $collection = DB::table('categories')->get();
        //     return view('categories.index', compact('categories'));
        // }
        // catch (\Exception $e) {
        //     // return $e->getMessage();
            
        //     return "Нарушено уникальное ограничение";
        // }

        // return view('categories.index', compact('categories'));

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png',

        ]);

        $file = request()->file('image') ? request()->file('image')->store('images', 'public') : null;

        $categories = categories::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'metadesc' => $request['metadesc'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent_id'],
            'active' => $request['active'],
            'image' => $file,

        ]);

        return redirect()->route('categories.index', $categories);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = DB::table('categories')->find($id);
        return view('categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        $categories = Categories::where('parent_id', null)->get();
        return view('categories.edit', compact('categories', 'category'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png',
            'slide' => 'sometimes|image|mimes:jpg,jpeg,png',
        ]);
        $categories = Categories::findOrFail($id);   //add this line (add your modelname)
        $categories->update([
            'name' => $request['name'],
            'title' => $request['title'],
            'metadesc' => $request['metadesc'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'active' => $request['active'],
            'parent_id' => $request['parent_id'],
            'slug' => $request['slug'],
        ]);
        if (request()->file('image')) {
            $categories->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }
        else if(request()->file('slide')){
            $categories->update([
                'slide' => request()->file('slide')->store('images', 'public'),
            ]);
        }


        return redirect()->route('categories.index', $categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = DB::table('categories')->delete($id);
        return redirect(route('categories.index'));
    }
    
}
