<?php
/** @var $model  \yii\data\ActiveDataProvider */
?>

<div class="card m-1" style="width: 18rem;">
    <a href="<?=\yii\helpers\Url::to(['video/view/' ,'video_id'=>$model->video_id])?>">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" width="100%"
                   poster="<?= $model->getThumbnailLink() ?>"
                   src="<?= $model->getVideoLink() ?>">
            </video>
        </div>
    </a>
    <div class="card-body">
        <h6 class="card-title"><?= $model->title ?></h6>
        <p class=" text-muted card-text m-0" ><?=$model->createdBy->username?>.</p>
        <p class=" text-muted card-text m-0">130 views  . <?=Yii::$app->formatter->asRelativeTime($model->created_at)?></p>
    </div>
</div>
