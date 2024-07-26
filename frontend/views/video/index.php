<?php
/** @var $dataProvider  \yii\data\ActiveDataProvider */
?>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item_view',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false,
    ]
]) ?>
