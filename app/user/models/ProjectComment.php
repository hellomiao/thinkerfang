<?php

namespace app\user\models;

use Yii;

/**
 * This is the model class for table "w_project_comment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property string $content
 * @property integer $create_time
 */
class ProjectComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'w_project_comment';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' =>'user_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'create_time'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'project_id' => '项目id',
            'content' => '评论内容',
            'create_time' => '评论时间',
        ];
    }
}
