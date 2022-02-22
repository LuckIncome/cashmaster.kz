<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = DB::table('users')->get();

        return view('profile', compact('collection'));
        // $request->user()->authorizeRoles(['employee', 'manager']);
        // return view('profile');
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
        // $orders = DB::table('orders_product')->find($id);
        $orders = DB::table('orders_user')->get();
        $orders2 = DB::table('order_products')->get();
        // dd($orders);

        return view('history', compact('orders', 'orders2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = DB::table('users')->find($id);
        // $password = bcrypt('secret');
        // $change = $collection->password;
        // // dd($change);
        // // dd($password);
        // $hashedPassword = Hash::make('secret');
        // if (Hash::check('secret', $change))
        // {
        //     // The passwords match...
        //     dd('test');
        // }else {
        //     dd('notest');
        // }

        return view('edit-profile', compact('collection'));
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
        // Make variables
        $OldPassword = $request->old_password;
        $NewPassword = $request->password;
        $ComfirmPassword = $request->repeat_password;
        $Email = $request->email;

        if($NewPassword == $ComfirmPassword)
        {
            // Find password hash
            $sql = DB::table('users')
                   ->where('email', $Email)
                   ->get();

            // Then dehash password and compare
            $HashedPassword = $sql[0]->password;


                DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->username,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'companyname' => $request->companyname,
                    'innbin' => $request->innbin,
                    'address' => $request->address,

                ]);

            if ($OldPassword == null) 
            {
                // echo "<script>alert('Пздц')</script>";
            }
            else
            {
                if(Hash::check($OldPassword, $HashedPassword) == true)
                {

                        
                    

                    DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'password' => Hash::make($request->password),

                    ]);
                }
                else
                {
                    // dd("Wrong password man");
                    echo "<script>alert('Wrong password man')</script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Новый пароль не совпадает')</script>";
        }
        return redirect(route('index.edit', $id));
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
