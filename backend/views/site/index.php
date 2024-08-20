<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>

<?php

$auth = Yii::$app->authManager;
if (Yii::$app->user->can('updateUser')){
   \yii\helpers\VarDumper::dump('asdasssssssssssd');
}else{
   \yii\helpers\VarDumper::dump('asdasd');
}?>
