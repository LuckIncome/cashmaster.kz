<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Vacancy;
class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy = DB::table('vacancies')->get();
        return view('vacancy.index', compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacancy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Vacancy::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        $vacancy = DB::table('vacancies')->get();

        return view('vacancy.index', compact('vacancy'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacancy = DB::table('vacancies')->find($id);
        return view('vacancy.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = DB::table('vacancies')->find($id);
        return view('vacancy.edit', compact('vacancy'));
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
        DB::table('vacancies')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect(route('vacancy.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = DB::table('vacancies')->delete($id);
        return redirect(route('vacancy.index'));
    }
}
