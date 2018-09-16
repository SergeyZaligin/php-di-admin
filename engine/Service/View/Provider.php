<?php declare(strict_types=1);

namespace Engine\Service\View;
use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;
/**
 * View provider
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
    public $serviceName = 'view';
    
    /**
     * Initialize service
     * 
     * @return mixed
     */
    public function init() 
    {
        $router = new View();
        $this->di->set($this->serviceName, $router);
    }

}

