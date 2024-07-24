<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Video $model */
/** @var yii\bootstrap5\ActiveForm $form */
\backend\assets\TagsAssets::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>


    <div class="row">
        <?=$form->errorSummary($model)?>

        <div class="col-sm-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Choose file</label>
                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
            </div>
            <?= $form->field($model, 'tags',
            ['inputOptions'=>['data-role'=>'tagsinput', 'class'=>'bg-primary']
            ])->textInput(['maxlength' => true]) ?>


        </div>
        <div class="col-sm-4">
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" width="100%"
                       poster="<?=$model->getThumbnailLink()?>"
                       src="<?= $model->getVideoLink() ?>"
                       controls>
                </video>
            </div>

            <div class="mt-4">
                <div class="text-muted">video_name</div>
                <?= $model->title ?>
            </div>
            <?= $form->field($model, 'status')->dropDownList($model->getStatusLabel())?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
