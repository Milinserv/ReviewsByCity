<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\City $model */

$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="city-view text-center">

    <h1><?= Html::encode($this->title) ?></h1>
    <h1 class="display-4">Выберите ваш город из списка:</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= Html::dropDownList('city',1, $cities, ['class' => 'form-control']) ?>

    <div class="form-group mt-5">
        <?= Html::submitButton('Выбрать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

