<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use DB;
use App\Otherpage;
use App\Contacts;
use App\About;
use App\User;
use App\Vacancy;
use App\Partner;
use App\Role;
use App\forms;
use App\Article;
use App\Colleague;
use App\Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('article')->get();
        $article = Article::where('image', null)->latest()->get();
        // dd($article);
        // $product = DB::table('products')->where('is_active', 1)->get();
        $categories = Categories::where('parent_id', null)->get();
        $product = Product::where('is_active', 1)->get();
        $productSell = Product::where('sell', 1)->get();
        // dd($productSell);
        // $partner = Partner::where('is_active', 1)->get();
        $about = About::where('is_active', 1)->get();
        $currency = DB::table('currency')->where('id', 1)->get();
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        // dd($currency[0]->name);
        return view('index', compact( 'product', 'currency', 'about', 'categories', 'partner', 'productSell', 'article', 'seo'));
    }

    public function about()
    {
        $about = About::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        $pictures = DB::table('pictures')->get();
        $seo = DB::table('seo')->get();
        // dd($gallery);
        return view('about', compact('about', 'partner', 'pictures', 'seo'));
    }

    public function thank()
    {
        return view('thank');
    }
    
    public function thanks()
    {
        return view('thank-main');
    }    

    public function catalog()
    {
        $partner = DB::table('partners')->get();
        $product = DB::table('products')->where('is_active', 1);
        $product_s = Product::where('is_active', 1)->get();
        $productSell = Product::where('sell', 1)->get();
        $currency = DB::table('currency')->where('id', 1)->get();
        if($price = request('entityprice')){
            $product->orderBy('entityprice', $price);
        }
        $categories = Categories::where('parent_id', null)->where('active', 1)->get();
        // dd($categories);
        $seo = DB::table('seo')->get();
        return view('catalog', ['product' => $product->get()], compact('categories', 'product', 'currency', 'product_s', 'partner', 'productSell', 'seo'));
        // return view('catalog', ['product' => $product->get()]);
    }

    public function category(Categories $category){
        // $categories = Categories::where('id', $id)->first();
        $category_id = null;
        $product_random = DB::table('products')->where('is_active', 1);
        $currency = DB::table('currency')->where('id', 1)->get();
        $productSell = Product::where('sell', 1)->get();
        // $category_id = Categories::where('parent_id', null)->find($category);
        $partner = DB::table('partners')->get();

        // dd($category);
        // return view('catalog2', compact('category'));
        if(count($category->children))
        {
            $categories = Categories::where('parent_id', $category->id)->get();
            // dd($categories);
            return view('catalog2', compact('category', 'categories', 'product_random', 'currency', 'category_id', 'partner', 'productSell'));
        }
        else {
            $categories = Categories::where('parent_id', null)->get();
            
            $categories_pod = Categories::where('parent_id', $category->id)->latest()->get();
            // $product_s = DB::table('products')->where('is_active', 1)->get();
            $product_s = Product::where('is_active', 1)->get();
            $partner = DB::table('partners')->get();

            $product = product::where('category_id', $category->id)->where('is_active', 1);
        
            if($price = request('price'))
            {
                $product->orderBy('individualprice', $price)->get();
            }
            else
            {
                $product->orderBy('individualprice', 'asc')->get();
            }

            $product = $product->get();

            return view('products', compact('category', 'product', 'categories', 'currency', 'product_s','categories_pod', 'partner', 'productSell'));
        }

    }
    // public function productDetail(Category $category, Product $product)
    // {
    //     if($product->category == $category)
    //     {
    //         $page = $product;
    //         $similarProducts = product::active()
    //         ->where('category_id', $category->id)
    //         ->where('id', '!=', $product->id)
    //         ->limit(5)
    //         ->inRandomOrder()
    //         ->get();
    //         return view('products', compact('page', 'similarProducts'));
    //     }
    //     abort('404');
    // }
    public function productDetail(categories $category, product $product)
    {
        $products = product::where('is_active', 1)->get();
        $currency = DB::table('currency')->where('id', 1)->get();
        $categories = Categories::where('parent_id', 1)->first();
        $product_s = Product::where('is_active', 1)->get();
        $productSell = Product::where('sell', 1)->get();
        $partner = DB::table('partners')->get();
        if($product->category != $category){
            abort(404);
        }

        //dd($product);
        
        $parameters = DB::table('productparameter')->where('product_id', $product->id)->orderBy('parameter_id', 'ASC')->get();
        //$parameters = DB::table('productparameter')->where('product_id', $product->id)->get();
        //dd($parameters);

        return view('product', compact('product', 'products', 'currency', 'categories', 'product_s', 'parameters', 'productSell', 'partner', 'category'));
    }



    // public function catalog2()
    // {
    //     return view('catalog2');
    // }

    public function article()
    {
        // $data = DB::table('articles')->get();
        $data = Article::where('image', null)->latest()->get();
        // dd($data);
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        return view('article', compact('data', 'partner', 'seo'));
    }


    public function articles($id)
    {
        $articles = DB::table('articles')->find($id);
        // dd($articles);
        return view('articles', compact('articles'));
    }

    public function products($categories=null, $subcategories=null)
    {
        $product = DB::table('products')->where('is_active', 1);
        $currency = DB::table('currency')->where('id', 1)->get();

        if($categories == null || $subcategories == null)
        {
                    $somebullshit = DB::select("
            select z.id, z.name, z.description, z.techspec, z.image, z.entityprice, z.individualprice, z.is_active
            from products z
            INNER JOIN categories_products q ON z.id = q.id
        ");
        }
        else
        {
            $somebullshit = DB::select("
            select z.id, z.name, z.description, z.techspec, z.image, z.entityprice, z.individualprice, z.is_active
            from products z
            INNER JOIN categories_products q ON z.id = q.id
            where q.categories_id = $categories
            and q.subcategories_id = $subcategories
        ");
        }

        // dd($somebullshit);
        if($price = request('entityprice')){
            $product->orderBy('entityprice', $price);
        }

        return view('products', ['product' => $product->get()], compact('currency', 'somebullshit','categories', 'subcategories'));
    }

    // public function product()
    // {
    //     // $product = DB::table('products')->where('is_active', NULL)->get();
    //     return view('product', compact('product'));
    // }

    public function product($id)
    {
        $products = DB::table('products')->find($id);
        // dd($products);
        return view('product', compact('products'));
    }

    public function cart()
    {
        $seo = DB::table('seo')->get();
        return view('basket', compact('seo'));
    }
    public function cart2()
    {
        return view('entity-basket');
    }

    public function form()
    {
        return view('form');
    }
     public function modal(Request $request)
    {
        $this ->validate(request(), [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'
        ]);

        $forms = forms::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' =>$request['email'],
        ]);
        
        $message = "Имя: ".request('name')."\nE-mail:".request('email')."\nPhone:" .request('phone');
        $subject = "Форма с сайта cashmaster.kz";
        $headers = 'From: info@cashmaster.kz' . "\r\n" .
            'Reply-To: info@cashmaster.kz' . "\r\n".
            'X-Mailer: PHP/' . phpversion();

            mail('015@i-marketing.kz', $subject, $message, $headers);

        // return response()->json(['msg' => request()->all()]);
        return view('thankmodal');
    }
    
     public function modal2(Request $request)
    {
        $this ->validate(request(), [
            'name'=>'required',
            'phone'=>'required',
        ]);

        $forms = forms::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' =>$request['email'],
        ]);
        
        $message = "Имя: ".request('name')."\nE-mail:".request('email')."\nPhone:" .request('phone');
        $subject = "Форма с сайта cashmaster.kz";
        $headers = 'From: info@cashmaster.kz' . "\r\n" .
            'Reply-To: info@cashmaster.kz' . "\r\n".
            'X-Mailer: PHP/' . phpversion();

            mail('015@i-marketing.kz', $subject, $message, $headers);

        // return response()->json(['msg' => request()->all()]);
        return view('thankmodal');
    }    

    public function contacts()
    {
        $contacts = Contacts::where('is_active', 1)->get();
        $colleagues = Colleague::where('status', 1)->get();
        $seo = DB::table('seo')->get();
        return view('contacts', compact('contacts', 'colleagues', 'seo'));
    }

    public function search()
    {
        $search = request('q');
        // dd($search);
        // $product = DB::table('products')->where('is_active', NULL)->get();
        $product = Product::where('is_active', 1);
        //dd($product);
        // $product = DB::table('products')->get();
        // $product = Product::active();
        $partner = DB::table('partners')->get();
        // $currency = DB::table('currency')->where('id', 1)->get();
        $currency = DB::table('currency')->where('description', 1)->get();        
        $product = $product->where('name', 'like', '%'.$search.'%')->get();
        $categories = Categories::where('parent_id', null)->get();
        $seo = DB::table('seo')->get();
        // $product = $product->paginate(2);
        // dd($product);
        return view('search', compact('product', 'categories', 'search', 'currency', 'partner','seo'));
    }
    
     public function search2()
    {
        $search = request('q');
        // dd($search);
        // $product = DB::table('products')->where('is_active', NULL)->get();
        $product = Product::where('is_active', 1);
        $product = $product->where('name', 'like', '%'.$search.'%')->get();
        // dd($product);
        // $product = $product->paginate(2);
        // dd($product);
        return view('search2', compact('product', 'search'));
    }
    
 
    // public function profile()
    // {
    //     $collection = DB::table('users')->first();
    //     return view('edit-profile', compact('collection'));
    // }
    // public function update(Request $request, $id)
    // {
    //     // dd($request->username);
    //     // //
    //     // dd($id . " " . "UPDATE");

    //     DB::table('users')
    //     ->where('id', $id)
    //     ->update(['name' => $request->username]);

    //     return redirect(route('edit-profile', $id));
    //     // $collection->save();
    // }
    public function vacancy()
    {
        $vacancy = Vacancy::where('is_active', 1)->get();
        $seo = DB::table('seo')->get();
        return view('vacancies', compact('vacancy', 'seo'));
    }
    public function cooperation()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        return view('cooperation', compact('otherpage', 'partner', 'seo'));
    }
    public function service()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        return view('service', compact('otherpage', 'partner', 'seo'));
    }
    public function contactsform(Request $request)
    {
        $this ->validate(request(), [
            'name'=>'required',
            'phone'=>'required',
            'tech'=>'required',
            'email'=>'required'
        ]);
        $forms = forms::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'body' =>$request['email'],
            'techspec' =>$request['tech'],
        ]);

        $message = "Имя: ".request('name')."\nE-mail:".request('email')."\nPhone:" .request('phone')."\nОтдел:" .request('tech');
        $subject = "Форма с сайта hansolomed.kz";
        $headers = 'From: info@tester.kz' . "\r\n" .
            'Reply-To: info@tester.kz' . "\r\n".
            'X-Mailer: PHP/' . phpversion();

            mail('015@i-marketing.kz', $subject, $message, $headers);

        // return response()->json(['msg' => request()->all()]);
        return view('thankmodal');
    }
    

    public function business()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        return view('footer.business', compact('otherpage', 'partner', 'seo'));
    }
    public function connect()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        return view('footer.connect', compact('otherpage', 'partner'));
    }
    public function maintenance()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $partner = DB::table('partners')->get();
        return view('footer.maintenance', compact('otherpage', 'partner'));
    }
    public function project()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $gallery = DB::table('galleries')->get();
        $partner = DB::table('partners')->get();
        $seo = DB::table('seo')->get();
        return view('footer.project', compact('otherpage', 'partner', 'gallery', 'seo'));
    }

    public function postprice()
    {
        $otherpage = Otherpage::where('is_active', 1)->get();
        $seo = DB::table('seo')->get();
        return view('footer.postprice', compact('otherpage', 'partner', 'seo'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
    
    public function partners()
    {
        $partner = DB::table('partners')->get();
        return view('partners', compact('partner'));
    }
    
    
    
    //register
    public function entity()
    {
        return view('auth.enregis');
    }    
}
