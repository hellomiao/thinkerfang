<?php

namespace app\posts\models;

use Yii;

/**
 * This is the model class for table "{{%posts_category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $desc
 */
class PostsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posts_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '父级',
            'name' => '名称',
            'desc' => '描述',
        ];
    }


    public function getSelectList()
    {
        $list = self::findAll(['parent_id' => 0]);
        $data = ["0" => "父级"];
        foreach ($list as $key => $val) {

            $data[$val->id] = $val->name;
        }

        return $data;

    }

    public function getList()
    {
        $list = self::findAll();
        foreach ($list as $key => $val) {
            if($val->parent_id){

            }
        }

        return $list;
    }
}
