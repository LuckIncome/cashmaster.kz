<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contacts')->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = DB::table('contacts')->find($id);
        return view('contacts.show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = DB::table('contacts')->find($id);
        return view('contacts.edit', compact('contacts'));
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
        $file = request()->file('image') ? request()->file('image')->store('images', 'public') : null;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);

        $contacts = contacts::findOrFail($id);   //add this line (add your modelname)
        $contacts->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'phone1' => $request['phone1'],
            'phone2' => $request['phone2'],
            'phone3' => $request['phone3'],
            'phone4' => $request['phone4'],
        ]);
        if (request()->file('image')) {
            $contacts->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }

        return redirect()->route('contacts.index', $contacts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
