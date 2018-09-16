<?php declare(strict_types=1);

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;

/**
 * Description of Provider
 *
 * 
 */
class Provider extends AbstractProvider
{
    /**
     *
     * @var type string
     */
    public $serviceName = 'config';
    
    /**
     * init
     */
    public function init()
    {   
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');
        $this->di->set($this->serviceName, $config);
    }
    
}
