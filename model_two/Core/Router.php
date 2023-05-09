<?php

use Core\Middleware\Middleware;


class Router
{

    protected array $routes = [];

    public function add($uri, $controller, $method): static
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller): static
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller): static
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller): static
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller): static
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller): static
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function only($key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/'.$route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}
