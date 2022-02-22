<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Picture;
class PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = DB::table('pictures')->get();
        return view('pictures.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png',

        ]);

        $file = request()->file('image') ? request()->file('image')->store('images', 'public') : null;

        $gallery = Picture::create([
            'name' => $request['name'],
            'image' => $file,

        ]);

        return redirect()->route('pictures.index', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = DB::table('Picture')->find($id);
        return view('pictures.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = DB::table('pictures')->find($id);
        
        return view('pictures.edit', compact('gallery'));
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
        ]);

        $gallery = Picture::findOrFail($id);   //add this line (add your modelname)
        $gallery->update([
            'name' => $request['name'],
        ]);
        if (request()->file('image')) {
            $gallery->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }
        return redirect()->route('pictures.index', $gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = DB::table('pictures')->delete($id);
        return redirect(route('pictures.index'));
    }
}
