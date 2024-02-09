<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="city-view">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active"><?= $city->name ?></li>
        </ol>

        <div class="col-md-8">
            <article class="col-sm-8">
                <header class="page-header">
                    <h1 class="page-title"><?= $city->name ?></h1>
                    <span class=""><?= $city->date_create ?></span>
                </header>
                <div class="row">
                    <p>
                        <img src="" alt="">
                        IMAGE
                    </p>
                    <div>
                        <div class="row">
                            <p class="text-muted col-2">CONTENT</p>
                        </div>
                    </div>
                </div>
                <div class="row" style="">
                    <h4>Comments</h4>
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <section style="background-color: #eee; padding-top: 10px; border: 2px dotted orange; !important;">
                                <div class="container my-5 py-5">
                                    <div class="row d-flex">
                                        <div class="col-md-12 col-lg-10 col-xl-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <img class="col-md-2 rounded-circle shadow-1-strong me-3"
                                                             src="<?= $comment->user->image; ?>"
                                                             alt="avatar" width="60"
                                                             height="60"/>
                                                        <div class="col-md-2">
                                                            <h6 class="fw-bold text-primary mb-1">
                                                                <?= $comment->user->name; ?>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p class="text-muted small mb-0">
                                                                By <?= $article->author->name; ?> On <?= $comment->getDate(); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="mb-4 pb-2" style="word-break: break-all; width: 400px;">
                                                        <?= $comment->text; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <div style="padding-top: 20px">
                            <?php $form = ActiveForm::begin(['action' => ['site/comment', 'id' => $article->id], 'options' => ['role' => 'form']]) ?>
                            <div class="card-footer py-3 border-0" style="width: 485px">
                                <div class="d-flex flex-start w-100">
                                    <div class="form-outline w-100">
<!--                                        --><?php //= $form->field($commentForm, 'comment')
//                                            ->textarea(['class' => 'form-control', 'placeholder' => 'Write Message', 'rows' => '6'])
//                                            ->label(false)
//                                        ?>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Post comment
                                    </button>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>
        </div>


</div>
