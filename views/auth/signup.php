<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<article class="col-xs-12 maincontent">
    <header class="page-header">
        <h1 class="page-title">Registration</h1>
    </header>

    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="thin text-center">Register a new account</h3>
                <hr>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => ''],
                        'inputOptions' => ['class' => 'form-control'],
                        'errorOptions' => ['class' => 'invalid-feedback'],
                    ],
                ]); ?>
                    <div class="top-margin">
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="top-margin">
                        <?= $form->field($model, 'email')->textInput() ?>
                    </div>

                    <div class="top-margin">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Sign Up!', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    </div>

</article>