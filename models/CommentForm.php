<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $title;
    public $comment;
    public $rating;
    public $verifyCode;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['comment'], 'required'],
            [['comment'], 'string'],
            [['rating'], 'required'],
            [['rating'], 'string'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function saveComment($city_id, $author)
    {
        $comment = new Comment();

        $comment->id_city = $city_id;
        $comment->title = $this->title;
        $comment->text = $this->comment;
        $comment->rating = $this->rating;
        $comment->img = '';
        $comment->id_author = $author;
        $comment->date_create = date('Y-m-d');
        return $comment->save();
    }
}
