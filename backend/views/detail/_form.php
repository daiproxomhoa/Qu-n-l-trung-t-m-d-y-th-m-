<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Detail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_dc')->textInput() ?>
    <?= $form->field($model, 'header')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'content1')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content2')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content3')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content4')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content5')->textarea(['rows' => 3]) ?>



    <?= $form->field($model, 'image_name')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
