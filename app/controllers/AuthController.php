<?php

namespace App\Controllers;

use App\Forms\LoginForm;
use App\Forms\RegisterForm;
use App\Models\Users;

class AuthController extends ControllerBase
{

    public function showloginAction()
    {
        $this->view->form = new LoginForm();
        $this->view->pick('auth/login');
    }

    public function loginAction(){
        $form = new LoginForm();
        if(!$form->isValid($_POST)){
            $messages = $form->getMessages();
            foreach ($messages as $message) {
                $this->flashSession->error($message);
            }
            return 'false';
        }
        $auth = $this->di->getShared('auth');
        if($auth->attemp(
            $this->request->getPost('email'), $this->request->getPost('password'))
        ){
            return $this->response->redirect('/');
        }
        else{
            return $this->_redirectBack();
        }
    }

    public function showRegisterAction(){
        $this->view->form = new RegisterForm();
        $this->view->pick('auth/register');
    }

    public function registerAction(){
        $form = new RegisterForm();
        $user = new Users();

        $form->bind($_POST, $user);
        if(!$form->isValid()){
            return $this->_redirectBack();
        }
        $password = $user->password;
        $user->password = $this->security->hash($password);

        $user->save();

        if($this->di->getShared('auth')->attemp($user->email, $password)){
            $this->response->redirect('/');
        }
    }
}