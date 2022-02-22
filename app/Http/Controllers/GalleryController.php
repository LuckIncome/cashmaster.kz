<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Gallery;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = DB::table('galleries')->get();
        return view('gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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

        $gallery = Gallery::create([
            'name' => $request['name'],
            'image' => $file,

        ]);

        return redirect()->route('gallery.index', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = DB::table('galleries')->find($id);
        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = DB::table('galleries')->find($id);
        
        return view('gallery.edit', compact('gallery'));
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

        $gallery = Gallery::findOrFail($id);   //add this line (add your modelname)
        $gallery->update([
            'name' => $request['name'],
        ]);
        if (request()->file('image')) {
            $gallery->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }
        return redirect()->route('gallery.index', $gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = DB::table('galleries')->delete($id);
        return redirect(route('gallery.index'));
    }
}
