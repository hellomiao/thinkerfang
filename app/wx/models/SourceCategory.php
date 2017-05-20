<?php

namespace app\wx\models;

use Yii;

/**
 * This is the model class for table "w_source_category".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $parent_id
 * @property string $source_ids
 */
class SourceCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source_category}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['parent_id'], 'integer'],
            [['category_name'], 'string', 'max' => 100],
            [['source_ids'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'parent_id' => 'Parent ID',
            'source_ids' => '素材ids',
        ];
    }
}
