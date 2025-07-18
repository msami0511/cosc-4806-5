<?php

class App {

    protected $controller = 'login';
    protected $method = 'index';
    protected $special_url = ['apply'];
    protected $params = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $url = $this->parseUrl();

        // Normalize controller name to lowercase
        if (isset($url[0])) {
            $controller = strtolower($url[0]);
            $controllerFile = 'app/controllers/' . $controller . '.php';

            if (file_exists($controllerFile)) {
                $this->controller = $controller;
                unset($url[0]);
            } elseif (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
                $this->controller = 'home';
            }
        } elseif (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
            $this->controller = 'home';
        }

        require_once 'app/controllers/' . $this->controller . '.php';

        // Instantiate using lowercase class name (assuming you defined it that way)
        $this->controller = new $this->controller;

        // Load method if specified
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));

        if (empty($url[0])) {
            array_shift($url);
        }

        return $url;
    }
}
