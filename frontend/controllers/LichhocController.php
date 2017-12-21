<?php

namespace frontend\controllers;
use common\models\Image;
use common\models\Detail;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\Documment;

class LichhocController extends Controller
{

    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    function actionIndex()

    {
        $List = Documment::find()->asArray()->all();
        return $this->render('index', ['List' => $List]);

    }

    function actionDetail($id)
    {
        $List = Detail::find()->where(['id_dc'=>$id])->asArray()->one();
        $List1 = Documment::find()->where(['id'=>$id])->asArray()->one();
        $images = Image::find()->asArray()->all();
        return $this->render('detail', ['index' => $List1,'detail'=>$List,'images'=>$images]
        );
    }

    protected function findModel($id)
    {
        if (($model = Detail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

?>