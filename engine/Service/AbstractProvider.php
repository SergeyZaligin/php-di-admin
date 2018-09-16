<?php declare(strict_types=1);

namespace Engine\Service;
use Engine\DI\DI;
/**
 * Description of AbstractProvider
 *
 * @author SuslikEst
 */
abstract class AbstractProvider 
{
    /**
     * Object DI container
     * 
     * @var DI object
     */
    protected $di;
    
    /**
     * Constructor AbstractProvider
     * 
     * @param DI $di object
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
    
    /**
     * @return mixed
     */
    abstract function init();
}
