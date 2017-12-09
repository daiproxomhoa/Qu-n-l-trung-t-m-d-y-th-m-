<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\dangki */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dangki',
]) . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dangkis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_MH' => $model->id_MH]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dangki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
