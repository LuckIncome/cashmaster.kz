<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Administrator Panel Group */
Route::prefix('admin')->group(function () {
    /* Veryfying links for roles and permisson is done in controllers  */
    Route::get('/', 'AdministrationController@index')->name('admin');
    Route::resource('/user', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/role_user', 'Role_UserController');
    Route::resource('/categories', 'CategoriesController');
    Route::get('products/{id}/parameters', 'ProductsController@showParameters');
    Route::post('products/{id}/parameters', 'ProductsController@addParameter');
    Route::post('products/{id}/parameters/{parameterId}/update', 'ProductsController@updateParameter');
    Route::resource('/products', 'ProductsController');
    // Route::post('/createparameter', 'ProductsController@createparameter')->name('createparameter');
    Route::post('/editparameter', 'ProductsController@editparameter')->name('editparameter');
    Route::post('/clearparameter', 'ProductsController@clearparameter')->name('clearparameter');
    Route::post('/clearpicture', 'ProductsController@clearpicture')->name('clearpicture');
    Route::post('/clearpicture2', 'ProductsController@clearpicture2')->name('clearpicture2');
    Route::post('/clearpicture3', 'ProductsController@clearpicture3')->name('clearpicture3');
    Route::post('/clearpicture4', 'ProductsController@clearpicture4')->name('clearpicture4');
    Route::post('/clearpicture5', 'ProductsController@clearpicture5')->name('clearpicture5');
    Route::post('/clearpicture6', 'ProductsController@clearpicture6')->name('clearpicture6');
    Route::post('/clearpicture7', 'ProductsController@clearpicture7')->name('clearpicture7');    
    Route::resource('/articles', 'ArticleController');
    Route::resource('/currency', 'CurrencyController');
    Route::resource('/otherpage', 'OtherpageController');
    Route::resource('/contacts', 'ContactsController');
    Route::resource('/vacancy', 'VacancyController');
    Route::resource('/partner', 'PartnerController');
    Route::resource('/about', 'AboutController');
    Route::resource('/reports', 'ReportsController');
    Route::resource('/gallery', 'GalleryController');    
    Route::resource('/forms', 'FormsController');
    Route::resource('/colleagues', 'ColleaguesController');
    Route::resource('/pictures', 'PicturesController');
    Route::resource('/seo', 'SeoController');    
});
Route::get('/export', 'ReportsController@export')->name('export');
Route::get('/export2', 'ReportsController@export2')->name('export2');

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Route::resource('/profile', 'ProfileController');

/* Profile routes */
// Route::get('/profile', 'ProfileController@index')->name('profile');
Route::resource('/index', 'IndexController');

/* Page routes */
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/vacancy', 'HomeController@vacancy')->name('vacancy');

Route::get('/cooperation', 'HomeController@cooperation')->name('cooperation');

Route::get('/catalog', 'HomeController@catalog')->name('catalog');

Route::get('catalog/{category}', 'HomeController@category')->name('category.index2');

Route::get('catalog/{category}/{product}', 'HomeController@productDetail')->name('category.index3');


// Route::get('/articles', 'HomeController@articles')->name('articles');

Route::get('/catalog2', 'HomeController@catalog2')->name('catalog2');

// Route::get('/products', 'HomeController@products')->name('products');

// Route::get('/product/{id}', 'HomeController@product')->name('products');

// Route::get('/product', 'HomeController@product')->name('product');


Route::get('/form', 'HomeController@form')->name('form');

Route::post('/modal', 'HomeController@modal')->name('modal');

Route::post('/modal2', 'HomeController@modal2')->name('modal2');

Route::get('/contacts', 'HomeController@contacts')->name('contacts');

//--------------------------------------------------------------------
Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('/cart{id}', 'HomeController@cart')->name('basket');

Route::get('cart/add', 'CartController@add')->name('cart.add');

Route::get('cart/add22', 'CartController@add22')->name('cart.add22');

Route::get('cart/add{id}', 'CartController@add2')->name('cart.add2');

Route::get('order', 'CartController@order')->name('cart.order');

Route::post('paybox', 'CartController@paybox')->name('cart.paybox');

Route::post('order', 'CartController@store');

Route::get('cart/add/{id}', 'CartController@remove')->name('cart.remove');

Route::get('cart/redis/{id}', 'CartController@redis')->name('cart.redis');

//search
Route::get('/search', 'HomeController@search')->name('cart.search');

Route::get('/search2', 'HomeController@search2')->name('cart.search2');

Route::get('/search3', 'UserController@search3')->name('cart.search3');

Route::get('/article', 'HomeController@article');

Route::get('/article/{id}', 'HomeController@articles');

//export
Route::get('/searchdate', 'ReportsController@searchdate')->name('searchdate');

//profile
// Route::get('/profile', 'HomeController@profile')->name('edit-profile');

Route::get('/area', 'ProfileAreaController@edit')->name('area');

Route::get('/products/{categories}/{subcategories}', 'HomeController@products');

//service
Route::get('/service', 'HomeController@service');

Route::post('/contactsform', 'HomeController@contactsform')->name('contactsform');

//footer

Route::get('/business', 'HomeController@business');

Route::get('/connect', 'HomeController@connect');

Route::get('/maintenance', 'HomeController@maintenance');

Route::get('/project', 'HomeController@project');

Route::get('/postprice', 'HomeController@postprice');

Route::get('/thank', 'HomeController@thank');

Route::get('/thankyou', 'HomeController@thankyou');

Route::get('/thanks', 'HomeController@thanks');

Route::get('/partners', 'HomeController@partners');

Route::get('/qiwirequest', 'QiwitermController@index');

Route::post('/qiwi', 'CartController@qiwiterminal');

Route::post('/qiwiwalet','QiwiwaletController@index');

//register
Route::get('/entity-reg', 'HomeController@entity');