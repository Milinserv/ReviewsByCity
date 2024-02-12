<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string']
        ];
    }

    public function saveComment($city_id)
    {
        $comment = new Comment();

        $comment->id_city = $city_id;
//        $comment->title = $this->title;
        $comment->text = $this->comment;
        $comment->rating = 0;
        $comment->img = '';
        $comment->id_author = 1;
        $comment->date_create = date('Y-m-d');
        return $comment->save();
    }
}
