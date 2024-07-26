<?php //= \yii\helpers\VarDumper::dump($model, 10, 1)?>

<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item" width="100%"
                   poster="<?= $model->getThumbnailLink() ?>"
                   src="<?= $model->getVideoLink() ?>" controls>
            </video>
        </div>
        <h6><?=$model->title?></h6>
       <div class="d-flex justify-content-between align-items-center">
           <div class="">
               <p>146 views * <?=Yii::$app->formatter->asDate($model->created_at)?></p>
           </div>
           <div class="">
               <button class="btn btn-sm btn-outline-primary">
                   <i class="fas fa-thumbs-up "></i> 4
               </button>
               <button class="btn btn-sm btn-outline-primary">
                   <i class="fas fa-thumbs-down "></i> 3
               </button>
           </div>
       </div>
    </div>
    <div class="col-sm-4">

    </div>
</div>
