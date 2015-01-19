<?php

try {

    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(
    array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //Create a DI (dependency injector)
    $di = new Phalcon\DI\FactoryDefault();

    //Setup the database service
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(
        array(
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "dbname" => "test"
        ));
    });

    //Setup the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //Setup a base URI so that all generated URIs include the "soko" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/phalcon/');
        return $url;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
?>