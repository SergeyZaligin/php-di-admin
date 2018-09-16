<?php declare(strict_types=1);

namespace Engine\Core\Router;

/**
 * Class of Router
 *
 * @author sergey
 */
class Router 
{
    /**
     * List all routes
     * 
     * @var array
     */
    private $routes = [];
    /**
     * Host type of http://router.loc/
     * 
     * @var string
     */
    private $host;
    
    private $dispatcher;
    /**
     * Constructor class Router
     * 
     * @param string $host
     */
    public function __construct(string $host) 
    {
        $this->host = $host;
    }
    
    /**
     * Add new route
     * 
     * @param type $key
     * @param type $pattern
     * @param type $controller
     * @param type $method
     */
    public function add($key, $pattern, $controller, $method = 'GET') 
    {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }
    
    public function dispatch($method, $uri) 
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }
    
    public function getDispatcher() 
    {
        if(null === $this->dispatcher)
        {
            $this->dispatcher = new UrlDispatcher();
            
            foreach ($this->routes as $route) 
            {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        return $this->dispatcher;
    }
}
