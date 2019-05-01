<?php

use Illuminate\Routing\Router;

/**
 * My Distinc Wayout API Routes
 */
$router->group([
    'namespace' => 'Distinc\Wayout\Controller',
    'prefix' => 'api/contacts'
], function (Router $router) {

    $router->get('/', [
        'name' => 'contacts.index',
        'uses' => 'ContactsController@index'
    ]);

    $router->post('/', [
        'name' => 'contacts.store',
        'uses' => 'ContactsController@store'
    ]);

    $router->put('/{id}/contact', [
        'name' => 'contacts.update',
        'uses' => 'ContactsController@update'
    ]);

    $router->delete('/{id}/contact', [
        'name' => 'contacts.delete',
        'uses' => 'ContactsController@destroy'
    ]);
});