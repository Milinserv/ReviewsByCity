<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\ActiveForm;

YiiAsset::register($this);
?>
<div class="city-view">
    <div class="container offset-md-2">
        <div class="">
            <article class="col-sm-8">
                <header class="page-header">
                    <h1 class="page-title"><?= $city->name ?></h1>
                    <span class="pull-right"><?= $city->date_create ?></span>
                </header>
                <div style="border-top: 3px solid #b3cee4;"></div>
                <section>
                    <div class="">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10 col-xl-8">
                                <h3 class="m-3">Отзывы</h3>
                                <?php if (!empty($comments)): ?>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex flex-start">
                                                <div class="w-100">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h6 class="col-9 mb-0">
                                                            <?php if (!Yii::$app->user->isGuest): ?>
                                                                <p><?php
                                                                    Modal::begin([
                                                                        'title' => $comment->author->fio,
                                                                        'toggleButton' => [
                                                                            'label' => $comment->author->fio,
                                                                            'class' => 'btn text-primary fw-bold'],
                                                                    ]);
                                                                    echo 'Email: ' . $comment->author->email;
                                                                    echo '<br/><br/>';
                                                                    echo 'Телефон: ' . $comment->author->phone;
                                                                    Modal::end();
                                                                    ?></p>
                                                            <?php else: ?>
                                                                <p class="text-primary fw-bold"><?= $comment->author->fio ?></p>
                                                            <?php endif; ?>
                                                            <span class="text-dark ms-2"><?= $comment->text ?></span>
                                                        </h6>
                                                        <p class="mb-0"><?= $comment->getDate() ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex flex-row">
                                                            <i class="fas fa-star text-warning me-2"></i>
                                                            <i class="far fa-check-circle" style="color: #aaa;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif; ?>
                <?php if (!Yii::$app->user->isGuest): ?>
                    <div class="border-2-black" style="padding-top: 20px">
                        <?php $form = ActiveForm::begin(['action' => ['item/comment', 'id' => $city->id, 'author' => Yii::$app->user->id], 'options' => ['role' => 'form']]) ?>
                        <div class="card-footer py-3 border-0">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                    <?= $form->field($commentForm, 'title')
                                        ->textInput(['class' => 'form-control', 'rows' => '6'])
                                        ->label('Название отзыва')
                                    ?>
                                    <?= $form->field($commentForm, 'comment')
                                        ->textarea(['class' => 'form-control', 'rows' => '6'])
                                        ->label('Текст отзыва')
                                    ?>
                                    <?= $form->field($commentForm, 'rating')
                                        ->dropDownList([
                                            '0' => '1',
                                            '1' => '2',
                                            '2' => '3',
                                            '3' => '4',
                                            '4' => '5',
                                        ])
                                        ->label('Рейтинг')
                                    ?>
                                </div>
                            </div>
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Отправить отзыв
                                </button>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                <?php else: ?>
                    <div
                        class="border border-5 border-gray-400 rounded w-100 h-50 mt-5 text-center justify-content-center">
                        <p class="text-info fs-3 mt-3">Зарегистрируйтесь, чтобы оставить отзыв</p>
                    </div>
                <?php endif; ?>
            </article>
        </div>
    </div>
