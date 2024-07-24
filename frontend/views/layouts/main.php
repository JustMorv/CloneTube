<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
$this->beginContent('@frontend/views/layouts/base.php')
?>
<div class="wrap d-flex h-100 flex-column">
    <main role="main" class="d-flex">
        <?=$this->render('_sidebar')?>

        <div class="container-wrapper p-3">
            <!--        --><?php //= Breadcrumbs::widget([
            //            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            //        ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
</div>
<?php $this->endContent()?>
