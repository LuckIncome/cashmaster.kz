<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Partner;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = DB::table('partners')->get();
        return view('partner.index', compact('partner'));
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
        $partner = DB::table('partners')->find($id);
        return view('partner.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = DB::table('partners')->find($id);
        return view('partner.edit', compact('partners'));
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

        $partner = Partner::findOrFail($id);   //add this line (add your modelname)
        $partner->update([
            'name' => $request['name'],
        ]);
        if (request()->file('image')) {
            $partner->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }
        return redirect()->route('partner.index', $partner);
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
