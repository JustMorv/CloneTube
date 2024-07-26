<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoView;
use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class VideoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Video::find()->andWhere(['status' => Video::STATUS_PUBLISHED])->letest()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($video_id)
    {
        $video = Video::find()->where(['video_id' => $video_id])->one();
        if (!$video) {
            throw new NotFoundHttpException('video does`t not exist');
        }
        $videoView = new VideoView();
        $videoView->video_id = (integer)$video_id;
        $videoView->user_id = (integer)Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $video
        ]);
    }
}