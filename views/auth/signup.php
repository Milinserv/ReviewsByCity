<?php

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<article class="col-xs-12 maincontent">
    <header class="page-header">
        <h1 class="page-title">Регистрация</h1>
    </header>

    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <hr>
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => ''],
                        'inputOptions' => ['class' => 'form-control'],
                        'errorOptions' => ['class' => 'text-danger'],
                    ],
                ]); ?>
                <div class="top-margin">
                    <?= $form->field($model, 'fio')->textInput(['autofocus' => true])->label('ФИО') ?>
                </div>
                <div class="top-margin">
                    <?= $form->field($model, 'email')->textInput() ?>
                </div>
                <div class="top-margin">
                    <?= $form->field($model, 'phone')->textInput()->label('Номер телефона') ?>
                </div>
                <div class="top-margin">
                    <?= $form->field($model, 'password')->passwordInput()->label('Придумайте пароль') ?>
                </div>
                <div class="top-margin">
                    <?= $form->field($model, 'passwordRepeat')->passwordInput()->label('Повторите пароль') ?>
                </div>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::class)->label('Введите код') ?>

                <hr>

                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>

</article>