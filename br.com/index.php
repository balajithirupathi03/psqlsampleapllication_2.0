
<?php
require_once 'Core/autoLoader.php';
if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
    $splittedPath = explode('/', ltrim($path), 4);
    $role = ucfirst($splittedPath[1]);
    $method = isset($splittedPath[2]) ? $splittedPath[2] : exit('----Page Not Found----');
    $parameters = explode('/', ltrim($splittedPath[3]));
    if ($method !== 'Api') {
        $requiredFile = __DIR__ . '/Controller/' . $role . 'Controller.php';
        if (file_exists($requiredFile)) {
            $controllerClass = $role . 'Controller';
            $controllerObject = new $controllerClass();
            $controllerObject->$method($parameters);
        } else {
            exit('----Page Not Found----');
        }
    }
    else{
        $requiredFile = __DIR__ . '/Api/' . $role . 'Api.php';
        if(file_exists($requiredFile)){
            $apiClass = $role.'Api';
            $apiObject = new $apiClass();
            $apiMethod = $parameters[0];
            $apiObject->$apiMethod();
        }
    }

} else {
    $controllerClass = 'UserController';
    $controllerObject = new $controllerClass();
    $controllerObject->login();
}