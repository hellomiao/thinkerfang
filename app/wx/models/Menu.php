<?php

namespace app\wx\models;

use Yii;

/**
 * This is the model class for table "w_menu".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $category
 * @property string $type
 * @property string $key
 * @property string $url
 * @property integer $is_show
 * @property integer $is_del
 * @property integer $order_no
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'category', 'is_show', 'is_del', 'order_no'], 'integer'],
            [['name'], 'required'],
            [['name', 'key'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'category' => 'Category',
            'type' => 'Type',
            'key' => 'Key',
            'url' => 'Url',
            'is_show' => 'Is Show',
            'is_del' => 'Is Del',
            'order_no' => 'Order No',
        ];
    }
}
