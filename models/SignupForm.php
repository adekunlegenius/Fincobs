<?php

namespace app\models;

use app\models\User;

class SignupForm extends \yii\base\Model{

    public $username;
    public $email;
    public $password;
    public $fullname;
    public $retype_password;
    public $created_at;
    public $phone_no;

    public function rules(){

        return [


            ['fullname', 'filter', 'filter' => 'trim'],
            ['fullname', 'required'],
            ['fullname', 'string', 'min' => 2, 'max' => 255],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['phone_no', 'required'],
            ['phone_no', 'string'],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->fullname= $this->fullname;
        $user->phone_no = $this->phone_no;
        $user->created_date = date('Y-m-d H:i:s');
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

    public function checkRetypePassword(){

    }
}