<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <?php if ($cityVisitor): ?>
            <h1 class="display-4"><?php echo $cityVisitor; ?> ваш город ?</h1>
        <?php else: ?>

        <?php endif; ?>

        <div class="form-group mt-2">
            <?= Html::a('Да', [Url::toRoute(['city/item/view', 'name' => $cityVisitor])], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Нет', [Url::toRoute(['city/item/search'])], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
