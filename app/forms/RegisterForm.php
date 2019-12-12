<?php
namespace App\Forms;

use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class RegisterForm extends Form
{
    public function initialize(){
        $email = new Email('email', [
            'placeholder' => 'enter a valid email',
            'class' => 'form-control form-control-user'
        ]);
        $email->addValidator(new PresenceOf());
        $nama = new Text('name', [
            'placeholder' => 'enter your full name',
            'class' => 'form-control form-control-user'
        ]);
        $nama->addValidator(new PresenceOf());
        $password = new Password('password', [
            'placeholder' => 'Password',
            'class' => 'form-control form-control-user'
        ]);
        $password->addValidator(new PresenceOf());

        $this->add($email);
        $this->add($nama);
        $this->add($password);

    }
}