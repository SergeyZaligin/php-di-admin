<?php declare(strict_types=1);

namespace Engine;

use Engine\DI\DI;
use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

/**
 * Start work Cms
 *
 * @author SuslikEst
 */
class Cms 
{
    /**
     *
     * @var type DI
     */
    private $di;
    
    /**
     * Router object
     * 
     * @var type Router object
     */
    public $router;


    /**
     * Constructor Cms
     * 
     * @param \Engine\DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }
    
    /**
     * Run Cms
     */
    public function run(): void 
    {
        try {
            require_once __DIR__ . '/../cms/Route.php';
            
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if(null === $routerDispatch)
            {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();

            call_user_func_array(
                [
                    new $controller($this->di), 
                    $action
                ], 
                $parameters
            );

            // echo '<pre>';
            // print_r($class);
            // echo '<br>';
            // print_r($action);
            // echo '</pre>';
            //print();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }

      }
}
