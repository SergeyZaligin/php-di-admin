<?php declare(strict_types=1);

namespace Engine\Service\Database;
use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;
use Engine\Core\Config\Config;

/**
 * Database provider
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
    public $serviceName = 'db';
    /**
     * Configuration db
     * 
     * @var array
     */
    private $configDb = [];
    /**
     * Initialize service
     * 
     * @return mixed
     */
    public function init() 
    {
        $this->configDb = $config['database'] = Config::file('database');
        //var_dump($this->configDb);
        $db = new Connection($this->configDb);
        $this->di->set($this->serviceName, $db);
    }

}
