<?php

use Illuminate\Routing\Router;


Route::group([
    'domain' => config('deep_admin.route.domain'),
    'prefix' => config('deep_admin.route.api_prefix'),
    'namespace' => '\Andruby\DeepDocs\Controllers',
    'middleware' => config('deep_admin.route.middleware')
], function (Router $router) {

    //版本管理
    $router->resource('version', 'VersionController');
    //项目管理
    $router->resource('project', 'ProjectController');
    //目录管理
    $router->resource('catalog', 'CatalogController');

});

Route::group([
    'domain' => config('deep_docs.route.domain'),
    'prefix' => config('deep_docs.route.docs_prefix'),
    'namespace' => '\Andruby\DeepDocs\Controllers',
    'middleware' => config('deep_docs.route.middleware')
], function (Router $router) {

    $router->get('/', 'DocsController@index')
        ->name('docs.index');
    $router->get('/p/{router_name?}', 'DocsController@index')
        ->name('docs.project');

    $router->get('/p/{router_name}/{version}', 'DocsController@version')->name('docs.version');
    $router->get('/p/{router_name}/{version}/{doc_id}.html', 'DocsController@detail')->name('docs.detail');

});

Route::fallback(function () {
    return view('larecipe::partials.404');
});

