<?php

namespace backend\controllers;

use Yii;
use common\models\dangki;
use common\models\dangki_search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DangkiController implements the CRUD actions for dangki model.
 */
class DangkiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all dangki models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new dangki_search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single dangki model.
     * @param integer $id_user
     * @param integer $id_MH
     * @return mixed
     */
    public function actionView($id_user, $id_MH)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_MH),
        ]);
    }

    /**
     * Creates a new dangki model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new dangki();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_MH' => $model->id_MH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing dangki model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_MH
     * @return mixed
     */
    public function actionUpdate($id_user, $id_MH)
    {
        $model = $this->findModel($id_user, $id_MH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_MH' => $model->id_MH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing dangki model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_MH
     * @return mixed
     */
    public function actionDelete($id_user, $id_MH)
    {
        $this->findModel($id_user, $id_MH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the dangki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_MH
     * @return dangki the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_MH)
    {
        if (($model = dangki::findOne(['id_user' => $id_user, 'id_MH' => $id_MH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
