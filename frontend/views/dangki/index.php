<?php
/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 21/12/2017
 * Time: 10:57 SA
 */

use yii\helpers\Html;
use common\models\Teacher;
use common\models\Subject;

$this->title = 'Đăng kí học trực tuyến';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dangki-index">
    <h1><?= Html::encode($this->title) ?></h1>
</div>


<form action="index" method="post">
    <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
           value="<?= Yii::$app->request->csrfToken ?>"/>
    <div class="main_container">
        <div class="row">
            <div class="box bordered-box green-border" style="margin-bottom:0">
                <div class="box-header green-background">
                    <div class="title">Những môn có thể đăng kí: [Tài
                        khoản: <?php echo Yii::$app->user->identity->username ?>]
                    </div>
                </div>
                <div class="box-content box-no-padding" id="DSDK" style="max-height: 300px;overflow: auto">
                    <table class="table table-hover table-bordered" style="margin-bottom: 0">
                        <thead>
                        <tr>
                            <th title="Tích để chọn đăng kí">Chọn</th>
                            <th title="ID">Mã Môn</th>
                            <th title="Môn học">Môn Học</th>
                            <th title="Giáo viên">Giáo viên</th>
                            <th title="Lịch học">Lịch học</th>
                            <th title="Bắt Đầu">Bắt Đầu</th>
                            <th title="Số buổi">Số buổi</th>
                            <th title="Tổng học sinh">Tổng học sinh</th>
                            <th title="Học Phí">Học Phí</th>
                        </tr>
                        </thead>

                        <?php
                        for ($i = 0; $i < count($List); $i++) {
                            $teacher = Teacher::find()->where(['id' => $List[$i]['teacher_id']])->one();
                            ?>

                            <?php
                            $check = false;
                            for ($j = 0; $j < count($Dangki); $j++) {
                                if ($List[$i]['id'] == $Dangki[$j]['id_MH']) {
                                    $check = true;
                                }
                            }
                            if ($List[$i]['dangki'] < $List[$i]['amount'] && $check == false) {
                                ?>
                                <tbody title="<?php echo $List[$i]['subject_name'] ?>">
                                <td style="text-align: center">
                                    <input type="checkbox" name="checkbox[]" value='<?php echo $List[$i]['id'] ?>'>
                                </td>

                                <?php
                            } else if ($List[$i]['dangki'] < $List[$i]['amount'] && $check == true) {
                                ?>
                                <tbody title="Bạn đã đăng kí môn này ">
                                <td style="text-align: center">
                                </td>
                                <?php
                            } else {
                                ?>
                                <tbody title="Đã đủ số sinh viên đăng kí">
                                <td style="text-align: center">
                                </td>
                            <?php } ?>

                            <td style="text-align: center"><?php echo $List[$i]['id'] ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['subject_name'] ?></td>
                            <td style="text-align: center"><?php echo $teacher['name_teacher'] ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['schedule'] ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['time_start'] ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['time_study'] . '  Buổi' ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['dangki'] . '/' . $List[$i]['amount'] ?></td>
                            <td style="text-align: center"><?php echo $List[$i]['money'] . '  VNĐ' ?></td>
                            </tbody>
                        <?php } ?>
                    </table>
                    <br>
                </div>
                <div class="box-content box-no-padding" id="DSDK" style="max-height: 300px;overflow: auto">
                </div>
                <br>
                <br>
            </div>
            <div class="box bordered-box red-border" style="margin-bottom:0">
                <div class="box-body red-background">
                    <div class="title">Những môn đã đăng kí
                    </div>
                </div>
                <div class="box-content box-no-padding" id="DSDK" style="max-height: 300px;overflow: auto">
                    <table class="table table-hover table-bordered" style="margin-bottom: 0">
                        <thead>
                        <tr>
                            <th title="Tích để chọn xóa">Chọn</th>
                            <th title="ID">Mã Môn</th>
                            <th title="Môn học">Môn Học</th>
                            <th title="Giáo viên">Giáo viên</th>
                            <th title="Lịch học">Lịch học</th>
                            <th title="Bắt Đầu">Bắt Đầu</th>
                            <th title="Số buổi">Số buổi</th>
                            <th title="Tổng học sinh">Tổng học sinh</th>
                            <th title="Học Phí">Học Phí</th>
                        </tr>
                        </thead>

                        <?php
                        for ($i = 0; $i < count($Dangki); $i++) {
                            $Subject = Subject::find()->where(['id' => $Dangki[$i]['id_MH']])->one();
                            $teacher = Teacher::find()->where(['id' => $Subject['teacher_id']])->one();
                            ?>
                            <tbody title="<?php echo $Subject['subject_name'] ?>">
                            <td style="text-align: center">
                                <input type="checkbox" name="detele_cbx[]" value='<?php echo $Subject['id'] ?>'>
                            </td>

                            <td style="text-align: center"><?php echo $Subject['id'] ?></td>
                            <td style="text-align: center"><?php echo $Subject['subject_name'] ?></td>
                            <td style="text-align: center"><?php echo $Subject['schedule'] ?></td>
                            <td style="text-align: center"><?php echo $teacher['name_teacher'] ?></td>
                            <td style="text-align: center"><?php echo $Subject['time_start'] ?></td>
                            <td style="text-align: center"><?php echo $Subject['time_study'] . '  Buổi' ?></td>
                            <td style="text-align: center"><?php echo $Subject['dangki'] . '/' . $Subject['amount'] ?></td>
                            <td style="text-align: center"><?php echo $Subject['money'] . '  VNĐ' ?></td>
                            </tbody>
                        <?php } ?>
                    </table>
                    <br>
                </div>
                <div class="box-content box-no-padding" id="DSDK" style="max-height: 300px;overflow: auto">
                </div>
                <br>
                <br>
            </div>
            <hr class="hr-normal">
            <div class="row">
                <div class="col-md-8" style="line-height:40px;">
                        <span>
                            Tổng số môn đã đăng kí : [
                            <?php echo count($Dangki) ?>
                            ]
                        </span>
                </div>
                <button class="btn btn-success col-lg-2" style="margin-left: 100px" onclick="myFunction()">
                    <i class="icon-save"></i>
                    Ghi nhận
                </button>
            </div>
            <hr class="hr-normal">
            <script>
                function myFunction() {
                    confirm(" Bạn muốn đăng kí ?");
                }
            </script>
        </div>
    </div>
</form>
<br>
<br>
<br>
<strong>>>>> Mọi thắc mắc xin liên hệ : <b>01688897626</b><strong> <br> <br>
        <strong>>>>> Đăng kí tư vấn miễn phí:<a
                    href="https://www.facebook.com/vu.t.dai.56">https://www.facebook.com/vu.t.dai.56</a><strong>
