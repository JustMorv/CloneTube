<a class="btn <?php use yii\helpers\Url;

echo $channel->isSubcribed(Yii::$app->user->id)
    ? 'btn-secondary' : 'btn-danger' ?>"
   href="<?php echo Url::to(['channel/subscribe', 'username' => $channel->username]) ?>"
   data-method="post" data-pjax="1">
    Subscribe <i class="far fa-bell"></i>
    <?=$channel->getSubscribers()->count()?>
</a>
