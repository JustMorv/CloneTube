<a href="<?= \yii\helpers\Url::to(['/video/like', 'video_id' => $model->video_id]) ?>"
   class="btn btn-sm
   <?= $model->isLikeby(Yii::$app->user->id)
       ? 'btn-outline-primary'
       : 'btn-outline-secondary' ?>"
   data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-up "></i> <?=$model->getlikes()->count()?>
</a>


<a href="<?= \yii\helpers\Url::to(['/video/dis-like', 'video_id' => $model->video_id]) ?>"
   class="btn btn-sm
   <?= $model->isDisLikeby(Yii::$app->user->id)
       ? 'btn-outline-primary'
       : 'btn-outline-secondary' ?>"
   data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-down "></i>  <?=$model->getDislikes()->count()?>
</a>
