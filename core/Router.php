<?php
declare(strict_types=1);

namespace Core;

class Router
{
    /**
     * Associative array of routes (the routing table)
     */
    protected $routes = [];

    /**
     * Associative array of parameters in a route
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     * 
     * @param string $route The route URL
     * @param array|null $params Parameters (controller, action, etc.)
     * @return void
     */
    public function add(string $route, array $params = []): void
    {
        // escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);
        // convert variable {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
        // convert variable {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found
     * 
     * @param string $url The route URL
     * 
     * @return boolean true if a match found, false otherwise
     */
    public function match($url): bool
    {
        $url = $this->removeQueryStringVariables($url);

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Dispatch the route create the controller object and run action method
     * 
     * @param string $url the route URL
     * 
     * @return void
     */
    public function dispatch(string $url): void
    {
        if ($this->match($url)) {
            $controller = $this->getParam('controller') . 'Controller';
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) {
                $controllerObject = new $controller($this->getParams());
                $action = $this->getParam('action', 'index') . 'Action';
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controllerObject, $action])) {
                    $controllerObject->$action();
                } else {
                    throw new \Exception("method $action in controller $controller not found");
                }
            } else {
                throw new \Exception("controller $controller not found");
            }
        } else {
            throw new \Exception('No route matched.', 404);
        }
    }

    /**
     * Get all the routes from the routing table
     * 
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Get the currently matched parameters
     * 
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    public function getParam(string $name, $default = null)
    {
        return $this->params[$name] ?? $default;
    }

    /**
     * Convert the string with hyphens to StudlyCaps
     * e.g. post-authors => PostAuthors
     */
    public function convertToStudlyCaps(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    /**
     * Convert the string with hyphens to camelCase
     * e.g. add-new => addNew
     */
    public function convertToCamelCase(string $string): string
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * remove variable ?page=1&print=1... on the URL
     * 
     * @param string $url the full url
     */
    protected function removeQueryStringVariables($url): string
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }

    /**
     * get the namespace for the controller class
     */
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}
