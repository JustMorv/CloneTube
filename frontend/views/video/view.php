<?php //= \yii\helpers\VarDumper::dump($model, 10, 1)?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" width="100%"
                   poster="<?= $model->getThumbnailLink() ?>"
                   src="<?= $model->getVideoLink() ?>" controls>
            </video>
        </div>
        <h6><?= $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <p>146 views * <?= Yii::$app->formatter->asDate($model->created_at) ?></p>
            </div>
            <div class="">
                <?php \yii\widgets\Pjax::begin() ?>
                    <?= $this->render('_buttons', [
                        'model' => $model,
                        'likes' => $likes,
                    ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>

        <div class="">
               <?=\yii\helpers\Html::a($model->createdBy->username,['/channel/view', 'username' => $model->createdBy->username])?>
            <p><?=\yii\helpers\Html::encode($model->description)?></p>
        </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>
