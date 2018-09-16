<?php declare(strict_types=1);

namespace Engine\Service\Router;
use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;
/**
 * Router provider
 *
 * @author SuslikEst
 */
class Provider extends AbstractProvider
{
    /**
     * Service name
     * 
     * @var string
     */
    public $serviceName = 'router';
    
    /**
     * Initialize service
     * 
     * @return mixed
     */
    public function init() 
    {
        $router = new Router('http://router.loc/');
        $this->di->set($this->serviceName, $router);
    }

}

