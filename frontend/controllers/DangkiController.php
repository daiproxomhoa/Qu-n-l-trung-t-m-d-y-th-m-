<?php

/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 21/12/2017
 * Time: 10:56 SA
 */

namespace frontend\controllers;

use Symfony\Component\Console\Input\Input;
use Yii;
use common\models\Image;
use common\models\Subject;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\dangki;

class DangkiController extends Controller
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
        $List = Subject::find()->asArray()->all();
        $List1 = dangki::find()->where(['id_user' => Yii::$app->user->identity->getId()])->asArray()->all();
        if (isset($_POST['checkbox']) || isset($_POST['detele_cbx'])) {
            var_dump($_POST);

            if (isset($_POST['checkbox'])) {
                $checkbox = $_POST['checkbox'];
                for ($i = 0; $i < count($checkbox); $i++) {
                    $dangki = new dangki();
                    $dangki->id_user = Yii::$app->user->identity->getId();
                    $dangki->id_MH = $checkbox[$i];
                    $dangki->created_at = time();
                    $dangki->updated_at = time();
                    $dangki->save();
                    $subject = $this->findModel_Subject($checkbox[$i]);
                    $subject->dangki = $subject->dangki + 1;
                    $subject->save();
                }

            }
            if (isset($_POST['detele_cbx'])) {
                $detele_cbx = $_POST['detele_cbx'];
                for ($i = 0; $i < count($detele_cbx); $i++) {
                    $this->findModel_Dangki(Yii::$app->user->identity->getId(), $detele_cbx[$i])->delete();
                    $subject = $this->findModel_Subject($detele_cbx[$i]);
                    $subject->dangki = $subject->dangki - 1;
                    $subject->save();
                }
            }
            header("Refresh: 0; url=./index");
        } else {
            return $this->render('index', ['List' => $List, 'Dangki' => $List1]);
        }
    }

    protected function findModel_Subject($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel_Dangki($id_user, $id_MH)
    {
        if (($model = dangki::findOne(['id_user' => $id_user, 'id_MH' => $id_MH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

?>