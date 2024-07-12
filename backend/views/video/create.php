<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Video $model */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="upload-icon">
         <i class="fas fa-upload"></i>
    </div>
    <p><?=Yii::t('app', 'Переташите файл в окно ')?></p>
    <p><?=Yii::t('app', 'Загрузите видео с устройства. ')?></p>

<!--    --><?php //= $this->render('_form', [
//        'model' => $model,
//    ]) ?>

</div>
