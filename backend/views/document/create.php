<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Documment */

$this->title = Yii::t('app', 'Create Documment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
