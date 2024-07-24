<?php
/** @var common\models\Video $model */
?>
<div class="media">
    <div class="media-body ">
        <a href="<?=\yii\helpers\Url::to(['/video/update/', 'video_id'=>$model->video_id])?>">
            <div class="embed-responsive embed-responsive-16by9 mr-3 " style="width: 140px">
                <video class="embed-responsive-item" width="100%"
                       poster="<?= $model->getThumbnailLink() ?>"
                       src="<?= $model->getVideoLink() ?>">
                </video>
            </div>
        </a>
        <h6 class="mt-0"><?= $model->title ?></h6>
        <?= \yii\helpers\StringHelper::truncateWords($model->description ?? '', 5) ?>
    </div>
</div>