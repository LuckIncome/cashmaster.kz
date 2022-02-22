<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;
use App\Roles;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $user = User::where('role', 3)->get();

    
    // dd($user);
    // dd($user->roles);        
        $collection = User::latest()->get();
        $roles = DB::table('roles')->get();
        // $user =->get();
        return view('users.index', compact('collection', 'roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        return view('users.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        try
        {
            $data = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'companyname' => $request['companyname'],
                'innbin' => $request['innbin'],
                'password' => Hash::make($request['password']),
            ]);
            if($request->input('roles')){
                $user->roles()->attach($request->input('roles'));
            }
            $collection = DB::table('users')->get();

            return view('users.index', compact('collection'));
        }
        catch (\Exception $e) {
            //return $e->getMessage();
            return "Нарушено уникальное ограничение";
        }

        // return view('users.index', compact('collection'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $collection = DB::table('users')->find($id);
        
        $user = User::find($id);
        foreach ($user->roles as $role) {
            // dd($role->name);
        }        
        $user = User::find($id);
        $roles = DB::table('roles')->get();
        return view('users.show', compact('collection', 'user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $collection = DB::table('users')->find($id);
        $user = User::find($id);
        $roles = DB::table('roles')->get();
        return view('users.edit', compact('collection', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->username);
        // //
        // dd($id . " " . "UPDATE");
        // dd($request);

        $user
        ->update([
            'name' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'email' => $request->useremail,
            'companyname' => $request->usercompanyname,
            'innbin' => $request->userinnbin,
            'phone' => $request->userphone,
            'address' => $request->useraddress,
            
            'email_verified_at' => $request->useremail_verified_at
        ]);
        $user->roles()->detach();
        if($request->input('roles')){
            $user->roles()->attach($request->input('roles'));
        }
        return redirect(route('user.edit', $user));
        // $collection->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = DB::table('users')->delete($id);
        return redirect(route('user.index'));
    }
    
     public function search3()
    {
        $search = request('q');
        // $roles = DB::table('roles')->get();
        // $roles = Role::all();
        $roles = DB::table('roles')->get();
        // dd($search);
        // $product = DB::table('products')->where('is_active', NULL)->get();
        // $collection = DB::table('users');
        // $collection = User::all();
        // dd($collection);
        // $collection = User::where('name', 'like', '%'.$search.'%')->get();
        $collection = User::WhereRaw("name like '%$search%' or email like '%$search%'")->get();
        // dd($product);
        // $product = $product->paginate(2);
        // dd($product);
        return view('users.userSearch', compact('collection', 'search', 'roles'));
    }       
}
