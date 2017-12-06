<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\dangki */

$this->title = Yii::t('app', 'Create Dangki');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dangkis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dangki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
