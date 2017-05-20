<?php

namespace app\user\models;

use app\cms\models\Category;
use Yii;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $picture
 * @property integer $step
 * @property integer $category_id
 * @property integer $team
 * @property string $info
 * @property string $content
 * @property integer $create_time
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    public static $stepArr=[''=>'全部','0'=>'产品开发中','1'=>'产品已开发成功','2'=>'已经有收入','3'=>'已经盈利','4'=>'尚未启动'];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'step', 'category_id',  'create_time','up_num'], 'integer'],
            [['name'], 'required'],
            [['info', 'team','content'], 'string'],
            [['picture'],'file','extensions' => 'gif, jpg,png,jpeg']
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'name'=>'项目名称',
            'picture' => '图片',
            'step' => '阶段',
            'category_id' => '行业类别',
            'team' => '团队人数',
            'info' => '项目简介',
            'content' => '项目详情',
            'up_num'=>'支持数量',
            'create_time' => '创建时间',
        ];
    }

    public static function getImgUrl($picture){
        if($picture) {
            return \Yii::$app->imgUpload->getSaveUrl() . '/' . $picture;
        }else{
            $aurl=Yii::$app->assetManager->getPublishedUrl('@app/home/misc');
            return $aurl.'/img/default.jpg';
        }
    }

    public function getHotList($num){
        $list = $this->find()->orderBy('up_num DESC')->limit($num)->all();
        return $list;
    }
}
