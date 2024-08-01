<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;

class VideoController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'success' => [
                'class' => AccessControl::class,
                'only' => ['like', 'dislike'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post'],
                ]
            ]
        ];
    }

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
        $model = Video::find(Yii::$app->request->get('video_id'))->one();
        if (!$model) {
            throw new NotFoundHttpException('video does`t not exist');
        }

        $likes = VideoLike::find()->where(['video_id' => $video_id])->all();
        $videoView = new VideoView();
        $videoView->video_id = (integer)$video_id;
        $videoView->user_id = (integer)Yii::$app->user->id;
        $videoView->created_at = time();
        $videoView->save();

        return $this->render('view', [
            'model' => $model,
            'likes' => $likes,
        ]);
    }

    public function actionLike($video_id)
    {
        $video = $this->findVideo($video_id);
        $user_id = Yii::$app->user->id;
        $videoDisLike = VideoLike::find()->userIdVideID($user_id, $video_id)->one();
        if (!$videoDisLike) {
            $this->saveLikeDisLike($video_id, $user_id, VideoLike::TYPE_LIKE);
        } else if ($videoDisLike->type === VideoLike::TYPE_LIKE) {
            $videoDisLike->delete();
        } else {
            $videoDisLike->delete();
            $this->saveLikeDisLike($video_id, $user_id, VideoLike::TYPE_LIKE);
        }
        return $this->renderAjax('_buttons', ['model' => $video]);
    }
    public function actionDisLike($video_id)
    {
        $video = $this->findVideo($video_id);
        $user_id = Yii::$app->user->id;
        $videoDisLike = VideoLike::find()->userIdVideID($user_id, $video_id)->one();
        if (!$videoDisLike) {
            $this->saveLikeDisLike($video_id, $user_id, VideoLike::TYPE_DISLIKE);
        } else if ($videoDisLike->type === VideoLike::TYPE_DISLIKE) {
            $videoDisLike->delete();
        } else {
            $videoDisLike->delete();
            $this->saveLikeDisLike($video_id, $user_id, VideoLike::TYPE_DISLIKE);
        }
        return $this->renderAjax('_buttons', ['model' => $video]);
    }

    public function findVideo($id)
    {
        $video = Video::findOne($id);
        if (!$video) {
            throw  new NotFoundHttpException("video does`t not exist");
        }
        return $video;

    }

    public function saveLikeDisLike($video_id, $user_id, $type)
    {
        $videoDisLike = new VideoLike();
        $videoDisLike->video_id = $video_id;
        $videoDisLike->type = $type;
        $videoDisLike->user_id = $user_id;
        $videoDisLike->created_at = time();
        $videoDisLike->save();
    }
}