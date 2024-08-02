<div class="container-fluid rounded bg-light mb-2">
    <div class="jumbotron  ">
        <h2 class="display-4"><?= $channel->username ?></h2>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, incidunt.</p>
        <p class="lead ">
            <?php \yii\widgets\Pjax::begin() ?>
                <?=$this->render('_subscribe', ['channel'=>$channel])?>
            <?php \yii\widgets\Pjax::end() ?>

        </p>
        <br>
    </div>
</div>