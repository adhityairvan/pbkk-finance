<?php


namespace App\Forms;


use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends Form
{
    public function initialize(){
        $email = new Email('email', [
            'placeholder' => 'enter a valid email',
            'class' => 'form-control form-control-user'
        ]);
        $email->addValidator(new PresenceOf());
        $password = new Password('password',[
            'placeholder' => 'Password',
            'class' => 'form-control form-control-user'
        ]);
        $password->addValidator(new PresenceOf());
//        $rememberMe = new Check('remember_me');

        $this->add($email);
        $this->add($password);
//        $this->add($rememberMe);
    }
}