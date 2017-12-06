<?php
namespace frontend\controllers ;
 use yii\web\Controller;
 class DemoController extends Controller
 {
 	public function acctionIndex()
 	{
 		return $this->render ('demo');

 	}
 	public function actionHello(){
 		return $this->render('hello');
 	}
 }
 ?>