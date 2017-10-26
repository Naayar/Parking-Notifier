<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Users', 'action' => 'start']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->fallbacks(DashedRoute::class);
});

Router::scope('/sa', function(RouteBuilder $routes){

    $routes->connect('/admin', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/admin/nuevo', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/admin/detalle/*', ['controller' => 'Users', 'action' => 'view']);
    $routes->connect('/admin/editar/*', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('/empresa', ['controller' => 'Company', 'action' => 'index']);
    $routes->connect('/empresa/detalle/*', ['controller' => 'Company', 'action' => 'view']);
    $routes->connect('/empresa/nuevo', ['controller' => 'Company', 'action' => 'add']);
    $routes->connect('/empresa/editar/*', ['controller' => 'Company', 'action' => 'edit']);
    $routes->connect('/empresa/sucursal/nuevo/*', ['controller' => 'Sucursal', 'action' => 'add']);
    $routes->connect('/empresa/sucursal/detalle/*', ['controller' => 'Sucursal', 'action' => 'view']);
    $routes->connect('/empresa/sucursal/editar/*', ['controller' => 'Sucursal', 'action' => 'edit']);
    $routes->connect('/search', ['controller' => 'Users', 'action' => 'search']);
    $routes->connect('/medio', ['controller' => 'Medio', 'action' => 'lista']);
    $routes->connect('/medio/editar/*', ['controller' => 'Medio', 'action' => 'edit']);
    $routes->connect('/medio/nuevo', ['controller' => 'Medio', 'action' => 'add']);
    $routes->connect('/eventos', ['controller' => 'Evento', 'action' => 'index']);
    $routes->connect('/eventos/nuevo', ['controller' => 'Evento', 'action' => 'add']);
    $routes->connect('/eventos/editar/*', ['controller' => 'Evento', 'action' => 'edit']);
});

Router::scope('/users', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Users', 'action' => 'home']);
    $routes->connect('/detalle/*', ['controller' => 'Users', 'action' => 'view2']);
    $routes->connect('/nuevo', ['controller' => 'Users', 'action' => 'add2']);
    $routes->connect('/editar/*', ['controller' => 'Users', 'action' => 'edit2']);
    $routes->connect('/vehiculos', ['controller' => 'Vehiculo', 'action' => 'index']);
    $routes->connect('/vehiculos/nuevo', ['controller' => 'Vehiculo', 'action' => 'add']);
    $routes->connect('/vehiculos/*', ['controller' => 'Vehiculo', 'action' => 'view']);
    $routes->connect('/vehiculos/editar/*', ['controller' => 'Vehiculo', 'action' => 'edit']);
    $routes->connect('/notificaciones/detalle/*', ['controller' => 'Notificacion', 'action' => 'view2']);
    $routes->connect('/notificaciones/nuevo', ['controller' => 'Notificacion', 'action' => 'add']);
    $routes->connect('/medio', ['controller' => 'Medio', 'action' => 'index']);
    $routes->connect('/medio/preferencias/*', ['controller' => 'Medio', 'action' => 'edit2']);
    $routes->connect('/ingreso/*', ['controller' => 'Medio', 'action' => 'view']);
});

Router::scope('/admin', function (RouteBuilder $routes) {

    $routes->connect('/notificaciones', ['controller' => 'Notificacion', 'action' => 'index']);
    $routes->connect('/notificaciones/detalle/*', ['controller' => 'Notificacion', 'action' => 'view']);
    $routes->connect('/claves', ['controller' => 'Clave', 'action' => 'add']);
    $routes->connect('/nuevostaff', ['controller' => 'Users', 'action' => 'add3']);
});
/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
