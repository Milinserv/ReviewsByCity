<?php
namespace app\models;

use Cassandra\Date;
use yii\base\Model;
use yii\captcha\Captcha;

class SignupForm extends Model
{
    public $fio;
    public $email;
    public $password;
    public $phone;
    public $date_create;
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
        if ($this->validate())
        {
            $user = new Author();

            $user->attributes = $this->attributes;
            $user->date_create = date("Y-m-d");

            return $user->create();
        }
    }
}