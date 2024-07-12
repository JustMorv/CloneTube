<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $video_id
 * @property string $title
 * @property string|null $description
 * @property string|null $video_name
 * @property int|null $status
 * @property string|null $tags
 * @property int|null $has_thumbnail
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $update_at
 *
 * @property User $createdBy
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['description'], 'string'],
            [['status', 'has_thumbnail', 'created_by', 'created_at', 'update_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['title', 'video_name', 'tags'], 'string', 'max' => 512],
            [['video_id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'title' => 'Title',
            'description' => 'Description',
            'video_name' => 'Video Name',
            'status' => 'Status',
            'tags' => 'Tags',
            'has_thumbnail' => 'Has Thumbnail',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\videoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\videoQuery(get_called_class());
    }
}
