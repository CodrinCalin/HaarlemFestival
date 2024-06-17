<?php
namespace App;

class PatternRouter
{
    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        $uri = $this->stripParameters($uri);

        // Explode the URI by '/' or '?'
        $parts = preg_split('/[\/\?]/', $uri, -1, PREG_SPLIT_NO_EMPTY);

        if($parts && $parts[0] == "404"){
            include __DIR__ . '/views/common/404.php';
            return;
        }

        // Extract controller and method names
        $controllerName = "App\\Controllers\\" . ucfirst($parts[0] ?? 'home') . "Controller";
        $methodName = $parts[1] ?? 'index';

        if(!class_exists($controllerName) || !method_exists($controllerName, $methodName)) {
            http_response_code(404);
            include __DIR__ . '/views/common/404.php';
            return;
        }

        try {
            $controllerObj = new $controllerName();

            // Handle POST requests for cart actions
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['add_to_cart'])) {
                    $controllerObj->addToCart();
                } elseif (isset($_POST['remove_from_cart'])) {
                    $controllerObj->removeFromCart();
                } else {
                    $controllerObj->$methodName();
                }
            } else {
                $controllerObj->$methodName();
            }
        } catch(Error $e) {
            // For some reason the class/method doesn't work
            http_response_code(500);
            include __DIR__ . '/views/common/500.php';
        }
    }
}