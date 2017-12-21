<?php
/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 21/12/2017
 * Time: 10:57 SA
 */

use yii\helpers\Html;
use common\models\Teacher;

$this->title = 'Đăng kí ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dangki-index">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="box-content box-no-padding" id="DSDK" style="max-height: 300px;overflow: auto">
    <table class="table table-hover table-bordered" style="margin-bottom: 0">
        <thead>
        <tr>
            <th title="Tích để chọn đăng kí">Chọn</th>
            <th title="ID">ID</th>
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
            if ($List[$i]['dangki'] < $List[$i]['amount']) {
                ?>
                <tbody>
                <td style="text-align: center">
                    <input type="checkbox">
                </td>

            <?php } else { ?>
                <tbody title="Lớp đã đầy">
                <td style="text-align: center" >
                </td>
            <?php } ?>
            <td><?php echo $List[$i]['id'] ?></td>
            <td><?php echo $List[$i]['subject_name'] ?></td>
            <td><?php echo $teacher['name_teacher'] ?></td>
            <td><?php echo $List[$i]['schedule'] ?></td>
            <td><?php echo $List[$i]['time_start'] ?></td>
            <td><?php echo $List[$i]['time_study'] . '  Buổi' ?></td>
            <td><?php echo $List[$i]['dangki'] . '/' . $List[$i]['amount'] ?></td>
            <td><?php echo $List[$i]['money'].'  VNĐ' ?></td>
            </tbody>
        <?php } ?>

    </table>
</div>
</div>