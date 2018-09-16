<?php

namespace Admin\Controller;

/**
 * Description of LoginController
 *
 * @author sergey
 */
class LoginController extends AdminController
{
    public function form() 
    {
        $this->view->render('login');
    }
}
