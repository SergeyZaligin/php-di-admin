<?php declare(strict_types=1);

namespace Engine\Core\Router;

/**
 * Class UrlDispatcher
 *
 * @author SuslikEst
 */
class UrlDispatcher 
{
    /**
     * Types method
     * 
     * @var array
     */
    private $method = [
        'GET',
        'POST'
    ];
    
    /**
     * Routes methods
     * 
     * @var array
     */
    private $routes = [
      'GET' => [],
      'POST' => []
    ];
    
    /**
     * Patterns type segment
     * 
     * @var array
     */
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];
    /**
     * Add pattern
     * 
     * @param string $key
     * @param string $pattern
     */
    public function addPattern(string $key, string $pattern): void
    {
        $this->patterns[$key] = $pattern;
    }
    
    /**
     * Convert pattern, (id:int)
     * 
     * @param $pattern
     * @return mixed
    */
    private function convertPattern($pattern)
    {
        // if not (id:int)
        if(strpos($pattern, '(') === false)
        {
            return $pattern;
        }

        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }
    
    /**
     * Register path in browser
     * 
     * @param $method
     * @param $pattern
     * @param $controller
    */
    public function register($method, $pattern, $controller)
    {
        //print($pattern);
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }
    /**
     * Get routes by method
     * 
     * @param $method
     * @return array|mixed
    */
    private function routes(string $method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }
    
    public function dispatch(string $method, $uri)
    {
        $routes = $this->routes(strtoupper($method));
        
        // if key exists in array routes
        if (array_key_exists($uri, $routes)) 
        {
            return new DispatchedRoute($routes[$uri]);
        }
        
        // if array key not exists
        return $this->doDispatch($method, $uri);
    }
    
    /**
     * Method callback for function preg_replace_callback
     * 
     * @param $matches
     * @return string
     */
    private function replacePattern($matches)
    {
        return '(?<' .$matches[1]. '>'. strtr($matches[2], $this->patterns) .')';
    }

    /**
     * Select params
     * 
     * @param $parameters
     * @return mixed
     */
    private function processParam($parameters)
    {
        foreach($parameters as $key => $value)
        {
            if(is_int($key))
            {
                unset($parameters[$key]);
            }
        }

        return $parameters;
    }
    
   /**
    * @param $method
    * @return array|mixed
    * not dispatch
    */
    private function doDispatch($method, $uri)
    {
      foreach($this->routes($method) as $route => $controller)
      {
        $pattern = '#^' . $route . '$#s';

        if(preg_match($pattern, $uri, $parameters))
        {
            return new DispatchedRoute($controller, $this->processParam($parameters));
        }
      }
    }
}
