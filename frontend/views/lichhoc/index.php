<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
/* @var $detail common\models\Detail */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Lịch khai giảng';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="main">
        <div class="show-content">
            <div id='new-list'>
                <?php
                for ($i = 0; $i < count($List); $i++) {
                    ?>
                    <div id="bar-item">
                        <div class="item row">
                            <div class="col-tm-12 col-xs-5 col-sm-4">
                                <img src="<?php echo Yii::getAlias('@imageDC') . '/' . $List[$i]['image_name'] ?>"
                                     width="250" class="img-responsive" id='image_list'>
                            </div>
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= Html::a(Yii::t('app', $List[$i]['description']), ['detail', 'id' => $List[$i]['id']]) ?>
                            </div>
                            <p><?php echo $List[$i]['content'] ?></p>
                            <div class="form-group">
                                <?= Html::a(Yii::t('app', 'Xem them'), ['detail', 'id' => $List[$i]['id']], ['class' => 'btn btn-default']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="slider">
            </div>
        </div>
    </div>
</div>

