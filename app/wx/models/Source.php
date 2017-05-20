<?php

namespace app\wx\models;

use Yii;

/**
 * This is the model class for table "w_source".
 *
 * @property integer $id
 * @property string $category
 * @property integer $parent_id
 * @property string $title
 * @property string $desc
 * @property string $url
 * @property string $content
 * @property string $picture
 * @property integer $is_del
 * @property integer $create_time
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'content'], 'string'],
            [['parent_id', 'is_del', 'create_time'], 'integer'],
            [['title', 'content'], 'required'],
            [['title', 'url', 'picture'], 'string', 'max' => 150],
            [['desc'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => '0自定义页面 1单图文 2多图文',
            'parent_id' => 'Parent ID',
            'title' => '标题',
            'desc' => '摘要',
            'url' => 'Url',
            'content' => '详细',
            'picture' => '封面',
            'is_del' => '软删除',
            'create_time' => 'Create Time',
        ];
    }
}
