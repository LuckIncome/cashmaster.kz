<?php

namespace App\Http\Controllers;
use DB;
use App\Role_User;
use Illuminate\Http\Request;

class Role_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = DB::table('role_user')->get();
        // $role = DB::table('role_user')->where('role_id', $collection->id)->get();
        // $role = DB::table('role_user')->get();
        // dd($role);
        return view('role_user.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role_user.create');
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
            'role_id' => 'required|string|max:255',
            'user_id' => 'required',
        ]);

        $collection = Role_user::create([
            'role_id' => $request['role_id'],
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('role_user.index', $collection);
    }
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'role_id' => 'required|string|max:255',
    //         // 'user_id' => 'required|image|mimes:jpg,jpeg,png',
    //     ]);

    //     $collection = Role_User::create([
    //         'role_id' => $request['role_id'],
    //         // 'user_id' => $request['user_id'],
    //     ]);

    //     return redirect()->route('role_user.index', $collection);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = DB::table('role_user')->find($id);
        return view('role_user.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = DB::table('role_user')->find($id);
        
        return view('role_user.edit', compact('collection'));
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
        DB::table('role_user')
        ->where('id', $id)
        ->update([
            'role_id' => $request->username,
            'user_id' => $request->useremail,
        ]);
        
        return redirect(route('role_user.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = DB::table('role_user')->delete($id);
        return redirect(route('role_user.index'));
    }
}
