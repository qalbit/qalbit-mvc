<?php

namespace App\Support;

class Router
{
    protected array $routes = [
        'GET'  => [],
        'POST' => [],
    ];

    protected array $dynamicRoutes = [
        'GET'  => [],
        'POST' => [],
    ];

    protected $notFoundHandler = null;
    protected $errorHandler    = null;

    public function get(string $path, $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    protected function addRoute(string $method, string $path, $handler): void
    {
        if (str_contains($path, '{')) {
            // Dynamic route
            preg_match_all('#\{([^/]+)\}#', $path, $matches);
            $paramNames = $matches[1] ?? [];

            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $path);
            $pattern = '#^' . rtrim($pattern, '/') . '/?$#';

            $this->dynamicRoutes[$method][] = [
                'pattern' => $pattern,
                'handler' => $handler,
                'params'  => $paramNames,
            ];
        } else {
            // Static route
            $this->routes[$method][$path] = $handler;
        }
    }

    /**
     * Set 404 handler.
     */
    public function setNotFoundHandler($handler): void
    {
        $this->notFoundHandler = $handler;
    }

    /**
     * Set 500 handler (receives Throwable as first argument).
     */
    public function setErrorHandler($handler): void
    {
        $this->errorHandler = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri    = $_SERVER['REQUEST_URI'] ?? '/';

        $uri = parse_url($uri, PHP_URL_PATH) ?: '/';

        // --- Normalize trailing slash for "pretty" URLs ---
        // - Keep "/" as is
        // - If no trailing slash AND last segment has no dot (no extension) → add "/"
        //   Examples:
        //   /services      -> /services/
        //   /technologies  -> /technologies/
        //   /contact-us    -> /contact-us/
        //   /sitemap.xml   -> /sitemap.xml (unchanged)
        if ($uri !== '/' && substr($uri, -1) !== '/') {
            $basename = basename($uri);
            if (strpos($basename, '.') === false) {
                $uri .= '/';
            }
        }

        try {
            // 1) Static routes
            $handler = $this->routes[$method][$uri] ?? null;

            if ($handler) {
                $this->invokeHandler($handler, []);
                return;
            }

            // 2) Dynamic routes
            foreach ($this->dynamicRoutes[$method] ?? [] as $route) {
                if (preg_match($route['pattern'], $uri, $matches)) {
                    array_shift($matches);

                    $params = [];
                    foreach ($route['params'] as $index => $name) {
                        $params[$name] = $matches[$index] ?? null;
                    }

                    $this->invokeHandler($route['handler'], $params);
                    return;
                }
            }

            // 3) No route matched -> 404
            http_response_code(404);

            if ($this->notFoundHandler) {
                $this->invokeHandler($this->notFoundHandler, []);
                return;
            }

            echo '404 Not Found';
        } catch (\Throwable $e) {
            // 500 error
            http_response_code(500);

            if ($this->errorHandler) {
                $this->invokeHandler($this->errorHandler, [$e]);
                return;
            }

            echo 'Internal Server Error';
        }
    }

    protected function invokeHandler($handler, array $params): void
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            $controller = new $class();
            $response   = $controller->$method(...array_values($params));
        } elseif (is_callable($handler)) {
            $response = $handler(...array_values($params));
        } else {
            throw new \RuntimeException('Invalid route handler');
        }

        if (is_string($response)) {
            echo $response;
        }
    }
}
