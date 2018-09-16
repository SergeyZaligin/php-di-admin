<?php declare(strict_types=1);

namespace Cms\Controller;


/**
 * HomeController
 *
 * @author SuslikESt
 */
class HomeController extends CmsController
{
    
    
    public function index() 
    {
        $data = ['name'=>'Sergey'];
        $this->view->render('index', $data);
    }
    
    public function news($id) 
    {
        echo 'News page' . $id;
    }
}
