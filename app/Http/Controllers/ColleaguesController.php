<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Colleague;
class ColleaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $colleagues = Colleague::where('status', 1)->get();
        $colleagues = DB::table('сolleagues')->get();
        // dd($colleagues);
        return view('colleagues.index', compact('colleagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colleagues.create');
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
        $colleagues = Colleagues::create([
            'name' => $request['name'],
            'image' => $file,
        ]);
        return redirect()->route('colleagues.index', $colleagues);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colleagues = DB::table('colleagues')->find($id);
        return view('Colleagues.show', compact('colleagues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colleagues = DB::table('сolleagues')->find($id);
        
        return view('colleagues.edit', compact('colleagues'));
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
            'title' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png',
        ]);

        $colleagues = Colleague::findOrFail($id);   //add this line (add your modelname)
        $colleagues->update([
            'title' => $request['title'],
            'position' => $request['position'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'skype' => $request['skype'],            
            'status' => $request['status'],
        ]);
        if (request()->file('image')) {
            $colleagues->update([
                'image' => request()->file('image')->store('images', 'public'),
            ]);
        }
        return redirect()->route('colleagues.index', $colleagues);
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
