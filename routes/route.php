<?php

use Illuminate\Routing\Router;


Route::group([
    'domain' => config('admin.route.domain'),
    'prefix' => config('admin.route.api_prefix'),
    'namespace' => '\Andruby\DeepDocs\Controllers',
    'middleware' => config('admin.route.middleware')
], function (Router $router) {

    //版本管理
    $router->resource('version', 'VersionController');
    //项目管理
    $router->resource('project', 'ProjectController');
    //目录管理
    $router->resource('catalog', 'CatalogController');

//    //产品操作
//    $router->post("goods/addGoodsAttr", "GoodsController@addGoodsAttr")->name("addGoodsAttr");
//    $router->post("goods/addGoodsAttrValue", "GoodsController@addGoodsAttrValue")->name("addGoodsAttrValue");
});

Route::group([
    'domain' => config('deep_docs.route.domain'),
    'prefix' => config('deep_docs.route.docs_prefix'),
    'namespace' => '\Andruby\DeepDocs\Controllers',
    'middleware' => config('deep_docs.route.middleware')
], function (Router $router) {

    $router->get('/{router_name?}', 'DocsController@index')
        ->where(['router_name'=>'^(?!'.config('admin.route.prefix').'$)[a-z0-9]+$'])
        ->name('docs.index');
    $router->get('/{router_name}/{version}', 'DocsController@version')->name('docs.version');
    $router->get('/{router_name}/{version}/{doc_id}.html', 'DocsController@detail')->name('docs.detail');

});

Route::fallback(function () {
    return view('larecipe::partials.404');
});

