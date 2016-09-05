<?php

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function () {

    Route::group(['prefix' => 'categories'], function () {
        Route::get('', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::post('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::post('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

        Route::group(['prefix' => 'images'], function () {
            Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
        });
    });

    Route::get('/', 'WelcomeController@index');

    Route::get('exemplo', 'WelcomeController@exemplo');
});


// forma tradicional, sem utilizar grupos de rotas
/*
    Route::get('products',['as'=>'products','uses'=>'ProductsController@index']);
    Route::post('products',['as'=>'products.store','uses'=>'ProductsController@store']);
    Route::get('products/create',['as'=>'products.create','uses'=>'ProductsController@create']);
    Route::get('products/{id}/destroy',['as'=>'products.destroy','uses'=>'ProductsController@destroy']);
    Route::get('products/{id}/edit',['as'=>'products.edit','uses'=>'ProductsController@edit']);
    Route::post('products/{id}/update',['as'=>'products.update','uses'=>'ProductsController@update']);
*/

/*
// Rotas Agrupadas
Route::group(['prefix'=>'admin'], function(){
    Route::get('products', function(){
        return "Products";
    });
});

// criar padrão de validação
// ? significa que pode ou não receber o parametro
 Route::pattern('id2','[0-9]+');
Route::get('user2/{id2?}', function($id2 = 123) {
    if ($id2)
        return "Olá $id2";

    return "Não possui ID";
}
)->where('id2','[0-9]+');

// validação do tipo de dado passado no parâmetro
Route::get('user1/{id1?}', function($id1 = 123) {
    if ($id1)
        return "Olá $id1";

    return "Não possui ID";
});
*/

// Nomes das Rotas
/* Route::get('produtos-legais',['as'=>'produtos', function(){
    return "Produtos";
}]);

echo Route('produtos');die;
*/
/*
Route::get('listacategory','WelcomeCOntroller@listacategory');

Route::get('/exemplo2',function(){
    return "Oi";
});
*/

