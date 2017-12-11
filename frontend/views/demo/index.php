<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use common\models\Teacher;
use common\models\Image;

$giaovien = Teacher::find()->where(['id' => '1'])->asArray()->all();
$image = Image::find()->where(['id_image' => 2])->asArray()->all();
$this->params['breadcrumbs'][] = 'Demo';

?>
<div class="demo">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="test_demo">
        <img src="<?php echo Yii::getAlias('@imageURL').'/'. $image[0]['image_name'] ?>" w   class="img-responsive">
    </div>

    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

    <div class="row">
        <div class="panel panel-success">
            <div class="panel-body">
                <div class="fb-comments" data-href="https://www.facebook.com/LearnEnglish-497754600561704/"
                     data-numposts="5"></div>
                <div class="fb-like" data-href="https://www.facebook.com/LearnEnglish-497754600561704/"
                     data-layout="standard" data-action="like" data-size="small" data-show-faces="true"
                     data-share="true"></div>
                <div class="fb-save" data-uri="https://www.facebook.com/LearnEnglish-497754600561704/"
                     data-size="small"></div>
                <div class="fb-follow" data-href="https://www.facebook.com/LearnEnglish-497754600561704/"
                     data-layout="standard" data-size="small" data-show-faces="true"></div>
                <div class="fb-send" data-href="https://www.facebook.com/LearnEnglish-497754600561704/"></div>
                <div class="fb-share-button" data-href="https://www.facebook.com/LearnEnglish-497754600561704/"
                     data-layout="button_count" data-size="small" data-mobile-iframe="true"><a
                            class="fb-xfbml-parse-ignore" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FLearnEnglish-497754600561704%2F&amp;src=sdkpreparse">Chia
                        sẻ</a></div>
            </div>
        </div>
    </div>

</div>
