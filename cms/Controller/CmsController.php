<?php

namespace Cms\Controller;

use Engine\Controller;

/**
 * Cms controller
 */
class CmsController extends Controller
{
    /**
     * 
     * @param DI object $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
    }
}
