<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date_create
 */
class City extends ActiveRecord
{
    public const DEFAULT_CITY = 'Ижевск';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_create' => 'Date Create',
        ];
    }

    public static function getCitys()
    {
        return City::find()->all();
    }

    public static function getVisitorCity()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip. '?lang=ru'));
        $cityVisitor = ($query && $query['status'] == 'success') ? $query['city'] : self::DEFAULT_CITY;

        return $cityVisitor;
    }

    public static function getCityById($id)
    {
        return City::find()->where(['id' => $id])->one();
    }

    public static function getCityByName($name)
    {
        return City::find()->where(['name' => $name])->one();
    }

    public static function getByNameCityForView($name, $id = null)
    {
        $model = new City();

        if ($id)
        {
            $city = self::getCityById($id);
            return $city->name;
        }
        elseif (!City::isRecordedCity($name))
        {
            $model->name = $name;
            $model->date_create = date("Y-m-d");
            if ($model->save())
            {
                return $name;
            }
        }
        else
        {
            return $name;
        }
    }

    public static function isRecordedCity($city)
    {
        $isCity = City::find()->where(['name' => $city ])->one();
        return $isCity != null;
    }
}