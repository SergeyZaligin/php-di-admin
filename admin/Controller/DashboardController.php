<?php

namespace Admin\Controller;

/**
 * Description of DashboardController
 *
 * @author sergey
 */
class DashboardController extends AdminController
{
    public function index() 
    {
        $this->view->render('dashboard');
    }
}
