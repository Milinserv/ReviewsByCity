<?php

namespace app\models;

class SignupForm extends Author
{
    public $passwordRepeat;
    public $verifyCode;

    public function rules()
    {
        return [
            [['fio', 'email', 'password'], 'required'],
            [['fio'], 'string'],
            [['email'], 'email'],
            [['phone'], 'required'],
            [['email'], 'unique', 'targetClass' => 'app\models\Author', 'targetAttribute' => 'email'],
            ['verifyCode', 'captcha']
        ];
    }

    public function signup()
    {
        return $this->create();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_create = date("Y-m-d");
            return true;
        }
        return false;
    }
}