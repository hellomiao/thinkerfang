<?php

namespace app\user\models;

use Yii;

/**
 * This is the model class for table "{{%project_up}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $create_time
 */
class ProjectUp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_up}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'create_time'], 'integer'],
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
            'create_time' => 'Create Time',
        ];
    }
}
