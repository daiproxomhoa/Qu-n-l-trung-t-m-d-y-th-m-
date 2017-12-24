<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Trang chủ', 'url' => ['/site/index']],
        ['label' => 'Chương trình học', 'url' => ['/lichhoc/index']],
        ['label' => 'Liên lạc', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Đăng kí', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
    } else {

        $menuItems[] = ['label' => 'Đăng kí học', 'url' => ['/dangki/index']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 aside-left " style="width: auto">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <?php echo Html::a('Chương trình đào tạo', ['/lichhoc/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Lịch khai giảng', ['/lichhoc/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Bài tập các lớp', ['/dangki/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 admin-right ">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
