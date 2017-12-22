<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'header') ?>

    <?= $form->field($model, 'content1') ?>

    <?= $form->field($model, 'id_dc') ?>

    <?= $form->field($model, 'image_name') ?>

    <?php // echo $form->field($model, 'content2') ?>

    <?php // echo $form->field($model, 'content3') ?>

    <?php // echo $form->field($model, 'content4') ?>

    <?php // echo $form->field($model, 'content5') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
