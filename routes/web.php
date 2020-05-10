<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){

    Route::get('/', 'CartController@index')->name('index');

    Route::post('add', 'CartController@add')->name('add');
});


Route::get('/model', function () {
    //$products = \App\Product::all();//select * from products

    //$user = new \App\User();
 //   $user = \App\User::find(1);
//    $user->name = 'Usuário teste editado';
    //$user->email = 'email@teste.com';
    //$user->password = bcrypt('12345678');
 //   $user->save();

   // return $user->save();

    //Mass assignment -> atribuição em massa

/*     $user = \App\User::create([
        'name' => 'Marcelo de Azevedo',
        'email'=> 'marcelobazevedo@gmail.com',
        'password'=>bcrypt('201602')
    ]);

    dd($user); */

    //Mass update

  /*   $user = \App\User::find(42);
    $user->update([
            'name'=>'Marcelo Barros de Azevedo'
    ]); *///retorna true ou false


       /*  $user = \App\User::find(4);

       dd($user->store()); */

       //pegar os produtos de uma loja
      // $loja = \App\Store::find(1);
       //return $loja->products;  $loja->products()->where('id', 9)->get();

       //pegar as categorias de uma loja

       //$categoria = \App\Category::find(1);
       //$categoria->products;

       //cria uma loja para um usuario
       /* $user = \App\User::find(10);
       $store = $user->store()->create([
           'name'=> 'Loja Teste',
           'description'=> 'Loja teste de produtos de informátca',
           'mobile_phone'=> 'XXX-XXXX-XXXX',
           'phone'=> 'XXX-XXXX-XXXX',
           'slug'=> 'loja-teste'
       ]);

       dd($store); */

       //criando um produto para uma loja
/*        $store = \App\Store::find(41);
       $product = $store->products()->create([
        'name'=> 'Noteboo Dell',
        'description'=> 'CORE I5 10 GB',
        'body'=> 'Qualquer coisa...',
        'price'=> 2999.90,
        'slug'=> 'notebook-dell',
       ]);

       dd($product); */

       //criar uma categoria
/*        \App\Category::create([
            'name'=>'Games',
            'description'=> null,
            'slug'=> 'games'
       ]);

       \App\Category::create([
        'name'=>'Notebooks',
        'description'=> null,
        'slug'=> 'notebooks'
   ]);
 */

    //adicionar um produto a uma categoria e vice-versa
/*     $product = \App\Product::find(41);
    dd($product->categories()->sync([2]));

   return \App\Category::all(); */



    return \App\User::all();   // retorna todos os usuarios


    //return \App\User::find(3);  // retorna o usuario de ID 3

    //return \App\User::where('name', 'Jalyn Wilkinson')->get(); //equivale a um select * from users
    //where name == 'Jalyn Wilkinson';

    //return \App\User::where('name', 'Jalyn Wilkinson')->first(); //chama o primeiro resultado dessa condição;

    //return \App\User::paginate(10); //retorna 10 resultados por pagina

});




Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        /*  Route::prefix('stores')->name('stores.')->group(function(){

             Route::get('/', 'StoreController@index')->name('index');
             Route::get('/create', 'StoreController@create')->name('create');
             Route::post('/store', 'StoreController@store')->name('store');
             Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
             Route::post('/update/{store}', 'StoreController@update')->name('update');
             Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');

         }); */

         Route::resource('stores', 'StoreController');
         Route::resource('products', 'ProductController');
         Route::resource('categories', 'CategoryController');
         Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');


     });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
