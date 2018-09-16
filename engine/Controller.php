<?php

namespace Engine;
use Engine\DI\DI;
/**
 * Class Controller
 *
 * @author SuslikEst
 */
abstract class Controller 
{
    /**
     * DI container object
     * 
     * @var DI object
     */
    protected $di;
    protected $view;
    protected $db;
    protected $config;
    
    /**
     * 
     * @param DI $di object
     */
    public function __construct(DI $di) 
    {
        $this->di = $di;
        $this->view = $di->get('view');
    }
}
