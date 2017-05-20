<?php

namespace app\posts\models;

use Yii;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property integer $view_count
 * @property integer $is_sticky
 * @property integer $status
 * @property integer $create_time
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'view_count', 'is_sticky', 'status', 'create_time'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => '分类',
            'user_id' => '用户',
            'title' => '标题',
            'content' => '内容',
            'view_count' => '浏览量',
            'is_sticky' => '是否置顶 1置顶',
            'status' => '0正常 1删除 ',
            'create_time' => '发表时间',
        ];
    }
}
