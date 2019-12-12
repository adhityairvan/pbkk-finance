<?php
namespace App\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $user = $this->getUser();
        $keuangan = $user->Keuangan;
        $this->view->keuangan = number_format($keuangan->amount);
        return ;

    }

}

