<?php declare(strict_types=1);

namespace Engine\Core\Router;

/**
 * Class DispatchedRoute
 *
 * @author SuslikEst
 */
class DispatchedRoute 
{
    /**
     *
     * @var string
     */
    private $controller;
    /**
     *
     * @var array
     */
    private $parameters = [];
    
    /**
     * DispatchedRoute constructor.
     * 
     * @param $controller
     * @param array $parameters
    */
    public function __construct(string $controller, array $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * Return Controller
     * 
     * @return string
    */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * Return Parameters
     * 
     * @return array
    */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
