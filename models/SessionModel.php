<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\Cookie;

class SessionModel extends Model
{
    static $session;

    public static function setSession($city)
    {
        self::$session = Yii::$app->session;
        self::$session->open();
        self::$session['selectedCity'] = [
            'value' => $city,
            'lifetime' => 7200,
        ];

        return self::$session['selectedCity']['value'];
    }

    public static function getCityOnSession()
    {
        self::$session = Yii::$app->session;
        self::$session->open();
        return self::$session['selectedCity'] ? self::$session['selectedCity']['value'] : false;
    }
}