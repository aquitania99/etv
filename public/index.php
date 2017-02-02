<?php
/***********************************************
 * index.php
 * Driver class to run the "test-full-stack" app
 * 
 ***********************************************/
//Simple PHP session management used
session_start();

//loading composer dependencies
require('../vendor/autoload.php');

//Autoloading proprietary classes
//function taken from: http://www.php-fig.org/psr/psr-4/examples/
spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = 'Acme\\FsTest\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/../app/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

//Getting route definitions
require('../app/routes.php');

//Validating path
$path = isset($_GET['path']) ? $_GET['path']:'';
if( ! isset($__routes[$path]) )
    $path = NOT_FOUND;

$route = $__routes[$path];
$parts = explode('@', $route);

//instanciating controller
$controllerClass = "\\Acme\\FsTest\\Controllers\\".$parts[0].'Controller';
$controller = new $controllerClass;
$controller->$parts[1]();