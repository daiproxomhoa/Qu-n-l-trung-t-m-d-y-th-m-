<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$giaovien = Teacher::find()->where(['id' => '1'])->one();

$this->title = 'Demo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demo">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        $giaovien
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>



</div>
