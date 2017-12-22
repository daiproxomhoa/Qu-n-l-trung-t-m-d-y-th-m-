<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Documment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documment-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'document_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'link_download')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_user')->textInput() ?>
    <?= $form->field($model, 'image_name')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
