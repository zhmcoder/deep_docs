<?php

use Illuminate\Routing\Router;

Route::group([
    'domain' => config('deep_docs.route.domain'),
    'prefix' => config('deep_docs.route.docs_prefix'),
    'namespace' => '\Andruby\DeepDocs\Controllers',
    'middleware' => config('deep_docs.route.middleware')
], function (Router $router) {

    $router->get('/', 'DocsController@index')->name('docs.index');
    $router->get('/{version}', 'DocsController@version')->name('docs.version');
    $router->get('/{version}/{doc_id}.html', 'DocsController@detail')->name('docs.detail');

});
Route::fallback(function () {
    return view('larecipe::partials.404');
});

