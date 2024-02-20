<?php

namespace app\controllers;

use app\models\City;
use app\models\CommentForm;
use app\models\SessionModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'foreColor' => 0xFE980F, // цвет символов
                'minLength' => 2, // минимальное количество символов
                'maxLength' => 3, // максимальное
                'offset' => 10, // расстояние между символами (можно отрицательное)
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        $model = new City();
        $cityVisitor = $model->getVisitorCity();

        if (SessionModel::getCityOnSession())
        {
            $commentForm = new CommentForm();
            $city = $model->getCityByName($cityVisitor);
            $comments = $city->comments;

            return $this->redirect([
                'city/item/view',
                'name' => SessionModel::getCityOnSession(),
                'commentForm' => $commentForm,
                'comments' => $comments
            ]);
        }
        else
        {
            return $this->render('index', [
                'cityVisitor' => $cityVisitor,
            ]);
        }
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
