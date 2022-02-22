<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = DB::table('seo')->get();
        return view('seo.index', compact('seo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner.create');
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
        $partner = Partner::create([
            'name' => $request['name'],
            'image' => $file,
        ]);

        return redirect()->route('partner.index', $partner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seo = DB::table('seo')->find($id);
        return view('seo.show', compact('seo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seo = DB::table('seo')->find($id);
        return view('seo.edit', compact('seo'));
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
        DB::table('seo')
        ->where('id', $id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,            
        ]);
        
        return redirect(route('seo.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = DB::table('partners')->delete($id);
        return redirect(route('partner.index'));
    }
}
