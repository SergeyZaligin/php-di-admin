<?php declare(strict_types=1);

namespace Engine\Service\Database;
use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;
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
        $this->configDb = require __DIR__ . '/../../Config/config.php';
        //var_dump($this->configDb['db']);
        $db = new Connection($this->configDb['db']);
        $this->di->set($this->serviceName, $db);
    }

}
