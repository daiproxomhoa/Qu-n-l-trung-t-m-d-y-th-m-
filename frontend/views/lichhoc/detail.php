<?php
/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 13/12/2017
 * Time: 10:31 SA
 */

use yii\helpers\Html;

$this->title = $index['description'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lịch khai giảng'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail">

    <h2 class="tilte"><?= Html::encode($this->title) ?></h2>
    <div class="item row ">
        <div class="header_detail">
            <img src="<?php echo Yii::getAlias('@imageDC') . '/' . $index['image_name'] ?>"
                 style="height: 250px ;width: auto" class="col-md-6">

            <div class="col-lg-5 " id="header_text"><?php echo $detail['header'] ?></div>

        </div>

    </div>
    <div class="content">
        <br>
        <strong>>>>> Đăng kí tư vấn miễn phí:<a href="https://www.facebook.com/vu.t.dai.56">https://www.facebook.com/vu.t.dai.56</a><strong>
    </div>
    <br>
    <br>
    <p style="font-size: larger"><?php echo $detail['content1'] ?></p>
    <p style="font-size: larger"><?php echo $detail['content2'] ?></p>
    <ol>
        <p style="font-size: larger"><img
                    src="<?php echo Yii::getAlias('@imagePT') . '/' . $images[0]['image_name'] ?>"> <?php echo $detail['content3'] ?>
        </p>
        <p style="font-size: larger" ><img
                    src="<?php echo Yii::getAlias('@imagePT') . '/' . $images[0]['image_name'] ?>"> <?php echo $detail['content4'] ?>
        </p>
        <p style="font-size: larger  "><img
                    src="<?php echo Yii::getAlias('@imagePT') . '/' . $images[0]['image_name'] ?>"> <?php echo $detail['content5'] ?>
        </p>
    </ol>
    <p style="font-size: larger  ">
        Nào, hãy đến với cô và cùng <b>trải nghiệm tiếng Anh thông qua phương pháp hoàn toàn mới</b>, phương pháp:<b>x Phản Xạ -
            Truyền cảm hứng</b>. Phương pháp này sẽ giúp các em giao tiếp cực tự tin, trôi chảy và đặc biệt có thể tự phát triển
        hội thoại theo <b>bản đồ tư duy – Mind Map</b>.
    </p>
    <div>
        <img src="<?php echo Yii::getAlias('@imageDT') . '/' . $detail['image_name'] ?>" class="img-responsive">
    </div>

</div>

