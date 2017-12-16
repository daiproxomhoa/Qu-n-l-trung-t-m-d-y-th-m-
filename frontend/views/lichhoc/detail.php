<?php
/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 13/12/2017
 * Time: 10:31 SA
 */

use yii\helpers\Html;
use common\models\Documment;
use common\models\Detail;

$List = Documment::find()->asArray()->all();
$List = Detail::find()->asArray()->all();
$this->title = '<?ph';
$this->params['breadcrumbs'][] = $this->title;
?>
