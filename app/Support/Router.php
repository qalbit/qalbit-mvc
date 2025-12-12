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
        $originalMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $method         = $originalMethod;

        // Treat HEAD like GET for routing (your router only has GET/POST)
        if ($method === 'HEAD') {
            $method = 'GET';
        }

        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH) ?: '/';

        // Normalize trailing slash for pretty URLs
        if ($uri !== '/' && substr($uri, -1) !== '/') {
            $basename = basename($uri);
            if (strpos($basename, '.') === false) {
                $uri .= '/';
            }
        }

        // Buffer output so we can suppress body for HEAD without touching controllers
        ob_start();

        try {
            // 1) Static routes
            $handler = $this->routes[$method][$uri] ?? null;

            if ($handler) {
                $this->invokeHandler($handler, []);
                $body = ob_get_clean();

                if ($originalMethod === 'HEAD') {
                    // No body for HEAD; headers already set by controller
                    if (!headers_sent()) {
                        header('Content-Length: ' . strlen($body));
                    }
                    return;
                }

                echo $body;
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
                    $body = ob_get_clean();

                    if ($originalMethod === 'HEAD') {
                        if (!headers_sent()) {
                            header('Content-Length: ' . strlen($body));
                        }
                        return;
                    }

                    echo $body;
                    return;
                }
            }

            // 3) No route matched -> 404
            http_response_code(404);

            if ($this->notFoundHandler) {
                $this->invokeHandler($this->notFoundHandler, []);
                $body = ob_get_clean();

                if ($originalMethod === 'HEAD') {
                    if (!headers_sent()) {
                        header('Content-Length: ' . strlen($body));
                    }
                    return;
                }

                echo $body;
                return;
            }

            $body = ob_get_clean();
            if ($originalMethod === 'HEAD') {
                if (!headers_sent()) {
                    header('Content-Length: ' . strlen('404 Not Found'));
                }
                return;
            }
            echo '404 Not Found';
        } catch (\Throwable $e) {
            http_response_code(500);

            if ($this->errorHandler) {
                $this->invokeHandler($this->errorHandler, [$e]);
                $body = ob_get_clean();

                if ($originalMethod === 'HEAD') {
                    if (!headers_sent()) {
                        header('Content-Length: ' . strlen($body));
                    }
                    return;
                }

                echo $body;
                return;
            }

            $body = ob_get_clean();
            if ($originalMethod === 'HEAD') {
                if (!headers_sent()) {
                    header('Content-Length: ' . strlen('Internal Server Error'));
                }
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
