<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Product;
use App\productparameter;
use App\Categories;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('products')->latest()->paginate(20);
        // dd($product);
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $category = Categories::where('parent_id', null)->get();
        $category_1 = Categories::where('parent_id', 1)->get();        
        $category_2 = Categories::where('parent_id', 2)->get();
        $category_3 = Categories::where('parent_id', 3)->get();
        $category_4 = Categories::where('parent_id', 26)->get();
        // dd($category_1);
        return view('products.create', compact('categories', 'category', 'category_1', 'category_2', 'category_3', 'category_4'));
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
            'image1' => 'image|mimes:jpg,jpeg,png',
            'image2' => 'image|mimes:jpg,jpeg,png',
            'image3' => 'image|mimes:jpg,jpeg,png',
            'image4' => 'image|mimes:jpg,jpeg,png',
            'image5' => 'image|mimes:jpg,jpeg,png',
            'image6' => 'image|mimes:jpg,jpeg,png',
            'file' => 'uploads|mimes:txt,docx,csv,jpg,jpeg,png',
        ]);

        $file = request()->file('image') ? request()->file('image')->store('images', 'public') : null;
        $file2 = request()->file('image1') ? request()->file('image1')->store('images', 'public') : null;
        $file3 = request()->file('image2') ? request()->file('image2')->store('images', 'public') : null;
        $file4 = request()->file('image3') ? request()->file('image3')->store('images', 'public') : null;
        $file5 = request()->file('image4') ? request()->file('image4')->store('images', 'public') : null;
        $file6 = request()->file('image5') ? request()->file('image5')->store('images', 'public') : null;
        $file7 = request()->file('image6') ? request()->file('image6')->store('images', 'public') : null;
        $file8 = request()->file('file') ? request()->file('file')->store('uploads', 'public') : null;
        $product = product::create([
            'name' => $request['name'],
            'title' => $request['title'],
            'metadesc' => $request['metadesc'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'entityprice' => $request['entityprice'],
            'individualprice' => $request['individualprice'],
            'category_id' => $request['techspec'],
            'is_active' => $request['is_active'],
            'valut' => $request['valut'],
            'sell' => $request['sell'],
            'image' => $file,
            'image1' => $file2,
            'image2' => $file3,
            'image3' => $file4,
            'image4' => $file5,
            'image5' => $file6,
            'image6' => $file7,
            'file' => $file8,
        ]);

        // Adding parameters

        if($request->mytext != null)
        {
            $AmountParameters = count($request->mytext);
            $ValueParameters = $request->mytext;

            $Sequence = DB::table('products')->select('id')->orderBy('id', 'desc')->limit(1)->get();
            // dd(productparameter::all());
            
            $product_id = 0;
            
            for ($i=0; $i < $AmountParameters; $i++) {
                // В этом цикле создаеш инсерт на каждую переменную.
                // В таблице productparameter ищеш по product_id параметры
                $productparameter = productparameter::create([
                    'value' => $request->mytext[$i],
                    'label' => $request->label[$i],
                    'product_id' => $Sequence[0]->id, //$request['product_id'],
                    'parameter_id' => $product_id, //$request['parameter_id'],
                    // 'label' => $request->label[$i], //$request['label'],
                
                ]);
                $product_id++;
            }
        }

        // Adding parameters

        return redirect()->route('products.index', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = DB::table('products')->find($id);
        $categories = DB::table('categories')->get();
        $parameters = DB::table('productparameter')->where('product_id', $id)->orderBy('parameter_id', 'asc')->get();
        return view('products.edit', compact('products', 'categories', 'parameters', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image1' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image2' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image3' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image4' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image5' => 'sometimes|image|mimes:jpg,jpeg,png',
            'image6' => 'sometimes|image|mimes:jpg,jpeg,png',
        ]);

        $product->update([
            'name' => $request['name'],
            'title' => $request['title'],
            'metadesc' => $request['metadesc'],
            'keywords' => $request['keywords'],
            'description' => $request['description'],
            'entityprice' => $request['entityprice'],
            'individualprice' => $request['individualprice'],
            'category_id' => $request['techspec'],
            'is_active' => $request['is_active'],
            'sell' => $request['sell'],
            'valut' => $request['valut'],

        ]);
        if (request()->file('image')) {
            $product->update([
                'image' => request()->file('image')->store('images', 'public'),
                // 'image1' => request()->file('image1')->store('images', 'public'),
                // 'image2' => request()->file('image2')->store('images', 'public'),
                // 'image3' => request()->file('image3')->store('images', 'public'),  
                // 'image4' => request()->file('image4')->store('images', 'public'),  
                // 'image5' => request()->file('image5')->store('images', 'public'),  
                // 'image6' => request()->file('image6')->store('images', 'public'), 

            ]);
        }
        else if(request()->file('image1')){
            $product->update([
                'image1' => request()->file('image1')->store('images', 'public'),
            ]);    
        }
        else if(request()->file('image2')){
            $product->update([
                'image2' => request()->file('image2')->store('images', 'public'),
                
            ]);    
        }
        else if(request()->file('image3')){
            $product->update([
                'image3' => request()->file('image3')->store('images', 'public'),    
            ]);    
        }
        else if(request()->file('image4')){
            $product->update([
                'image4' => request()->file('image4')->store('images', 'public'),
            ]);    
        }
        else if(request()->file('image5')){
            $product->update([
                'image5' => request()->file('image5')->store('images', 'public'),
            ]);    
        }
        else if(request()->file('image6')){
            $product->update([
                'image6' => request()->file('image6')->store('images', 'public'),    
            ]);    
        }
        else if(request()->file('file')){
            $product->update([
                'file' => request()->file('file')->store('uploads', 'public'),    
            ]);    
        }

        return redirect()->route('products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = DB::table('products')->delete($id);
        return redirect(route('products.index'));
    }

    // -----------------------------------

    // Read parameters
    // parameters should be in main read function.

    // Create parameters
    // public function createparameter(Request $request)
    // {
    //     $AmountParameters = count($request->mytext);
    //     $ValueParameters = $request->mytext;

    //     $Sequence = DB::table('products')->select('id')->orderBy('id', 'desc')->limit(1)->get();
    //     // dd(productparameter::all());

    //     $product_id = 1;

    //     for ($i=0; $i < $AmountParameters; $i++) {
    //         // В этом цикле создаеш инсерт на каждую переменную.
    //         // В таблице productparameter ищеш по product_id параметры
    //         $productparameter = productparameter::create([
    //             'value' => $request->mytext[$i],
    //             'product_id' => $Sequence[0]->id, //$request['product_id'],
    //             'parameter_id' => $product_id, //$request['parameter_id'],
    //             // 'label' => $request->label[$i], //$request['label'],

    //         ]);
    //     }

    //     dd('DONE');

    //     $parameters = DB::table('productparameter')->get();
    //     return view('products.create', compact('parameters'));
    // }


    public function showParameters($id)
    {
        $product = product::find($id);
        $parameters = DB::table('productparameter')->where('product_id', $id)->get();
        return view('products.parameters', compact('product','parameters'));
    }

    public function addParameter(Request $request, $id)
    {
        $lastParam = productparameter::where('product_id', $id)->orderBy('parameter_id', 'desc')->first();

        productparameter::create([
            'value' => $request->val,
            'product_id' => $id, //$request['product_id'],
            'label' => $request->label, //$request['label'],
            'parameter_id' => $lastParam ? $lastParam->parameter_id + 1 : 1
        ]);

        return redirect()->back()->with('Added',true);
    }

    public function updateParameter(Request $request, $id, $parameterId)
    {
        $parameter = productparameter::find($parameterId);

        if ($request->metod == 'update') {
            $parameter->label = $request->label;
            $parameter->value = $request->val;
            $parameter->save();
            return redirect()->back()->with('Updated',true);
        }

        if ($request->metod == 'delete') {
            $parameter->delete();
            return redirect()->back()->with('Deleted', true);
        }

        return redirect()->back();
    }

    // Edit parameters
    public function editparameter(Request $request)
    {
        $id = $request->product_id;
        $AmountParameters = count($request->mytext);
        $ValueParameters = $request->mytext;
        $LabelParameters = $request->label;

        $checkparam = DB::table('productparameter')->where('product_id', $id)->orderby('parameter_id', 'asc')->count();
        // dd($request->mytext);
        // dd($AmountParameters . " | " . $checkparam);
        
        if($checkparam == 0)
        {
            $AmountParameters = count($request->mytext);
            $ValueParameters = $request->mytext;

            $Sequence = DB::table('products')->select('id')->orderBy('id', 'desc')->limit(1)->get();
            // dd(productparameter::all());

            $product_id = 0;

            for ($i=0; $i < $AmountParameters; $i++) {
                // В этом цикле создаеш инсерт на каждую переменную.
                // В таблице productparameter ищеш по product_id параметры
                $productparameter = productparameter::create([
                    'value' => $request->mytext[$i],
                    'product_id' => $id, //$request['product_id'],
                    'parameter_id' =>  $Sequence[0]->id, //$request['parameter_id'],
                    'label' => $request->label[$i], //$request['label'],

                ]);
                $product_id++;
        }
            return redirect()->back();
        }

        if($checkparam == $AmountParameters)
        {
            for ($i=0; $i < $AmountParameters; $i++) {
                DB::table('productparameter')
                    ->where('product_id', $id)
                    ->where('parameter_id', $i)
                    ->update([
                        'value' => $ValueParameters[$i],
                        'label' => $LabelParameters[$i],
                    ]);
            }

            $products = DB::table('products')->find($id);
            $categories = DB::table('categories')->get();
            $parameters = DB::table('productparameter')->where('product_id', $id)->orderBy('parameter_id', 'asc')->get();

            return redirect()->back();
        }

        if($checkparam < $AmountParameters)
        {
            echo "<script>alert('Много параметров, очистите сперва')</script>";
            return redirect()->back();
        }
    }

    public function clearparameter(Request $request)
    {
        $id = $request->product_id;

        DB::table('productparameter')
                    ->where('product_id', $id)
                    ->delete();

        return redirect()->back();
    }
    
    
    
    public function clearpicture(Request $request)
    {
        $id = $request->imagedelete;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image1' => null]);
        // dd($test->name);
        return redirect()->back();
    }

    public function clearpicture2(Request $request)
    {
        $id = $request->imagedelete2;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image2' => null]);
        // dd($test->name);
        return redirect()->back();
    }

    public function clearpicture3(Request $request)
    {
        $id = $request->imagedelete3;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image3' => null]);
        // dd($test->name);
        return redirect()->back();
    }

    public function clearpicture4(Request $request)
    {
        $id = $request->imagedelete4;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image4' => null]);
        // dd($test->name);
        return redirect()->back();
    }

    public function clearpicture5(Request $request)
    {
        $id = $request->imagedelete5;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image5' => null]);
        // dd($test->name);
        return redirect()->back();
    }

    public function clearpicture6(Request $request)
    {
        $id = $request->imagedelete6;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['image6' => null]);
        // dd($test->name);
        return redirect()->back();
    }
    public function clearpicture7(Request $request)
    {
        $id = $request->imagedelete7;
        $image2 = $request->image2delete;

        // dd($id);
        DB::table('products')
        ->where('id', $id)->update(['file' => null]);
        // dd($test->name);
        return redirect()->back();
    }    
}
