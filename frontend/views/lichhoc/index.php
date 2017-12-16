<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use common\models\Documment;


$List = Documment::find()->asArray()->all();
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
                            <div class="col-tm-12 col-xs-7 col-sm-8">
                                <a href="../site/contact"><?php echo $List[$i]['description'] ?></a>
                                <p><?php echo $List[$i]['content'] ?></p>
                            </div>
                            <button id="xemthem"><a href="../lichhoc/detail">Xem thêm</a></button>

                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="slider">
            </div>
        </div>
    </div>
</div>

</div>
