<?php

/** @var \yii\web\View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <?= $this->render('_header') ?>

    <div class="wrap d-flex h-100 flex-column">
        <?= $content ?>
    </div>

<!--    <footer class="footer mt-auto py-3 text-muted">-->
<!--        <div class="container">-->
<!--            <p class="float-start">&copy; --><?php //= Html::encode(Yii::$app->name) ?><!-- --><?php //= date('Y') ?><!--</p>-->
<!--            <p class="float-end">--><?php //= Yii::powered() ?><!--</p>-->
<!--        </div>-->
<!--    </footer>-->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
