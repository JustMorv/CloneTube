<?php
?>

<aside class="shadow">
    <?= \yii\bootstrap5\Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column  nav-pills'
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Home'),
                'url' => ['/site/index']
            ],
            [
                'label' => Yii::t('app', 'History'),
                'url' => ['/video/history']
            ]
        ]
    ]) ?>
</aside>