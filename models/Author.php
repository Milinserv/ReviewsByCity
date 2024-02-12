<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 * @property string|null $photo
 *
 * @property Comment[] $comments
 */
class Author extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['fio', 'email', 'phone', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'email' => 'Email',
            'phone' => 'Phone',
            'date_create' => 'Date Create',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_author' => 'id']);
    }

    public static function findIdentity($id)
    {
        return Author::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    public function getAuthKey()
    {
    }
    public function validateAuthKey($authKey)
    {
    }

    public static function findByEmail($email)
    {
        return Author::find()->where(['email' => $email])->one();
    }
    public function validatePassword($password)
    {
        return $this->password === static::hashPassword($password);
    }

    public static function hashPassword($password) {
        $salt = "stev37f";
        return md5($password.$salt);
    }

    public function create()
    {
        return $this->save(false);
    }

    public function getImage()
    {
        return $this->photo;
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date_create);
    }
}
