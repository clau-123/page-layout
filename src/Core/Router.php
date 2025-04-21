<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($route, $controller, $action) {
        $this->routes[$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function run() {
        $uri = $_SERVER['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route => $handler) {
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $route);
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove the full match
                $controller = $handler['controller'];
                $action = $handler['action'];

                $controllerInstance = new $controller();
                call_user_func_array([$controllerInstance, $action], $matches);
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}
