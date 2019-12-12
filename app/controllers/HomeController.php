<?php
namespace App\Controllers;

class HomeController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $auth = $this->di->getShared('auth');
//        return $auth->id();
    }

}

