<?php

namespace app\user\models;

use Yii;

/**
 * This is the model class for table "{{%user_token}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property integer $type
 * @property integer $is_used
 * @property integer $create_time
 */
class UserToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_token}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type', 'is_used', 'create_time'], 'integer'],
            [['token'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户',
            'token' => 'token',
            'type' => '0注册 1找回密码',
            'is_used' => '是否适用 0未使用 1已使用',
            'create_time' => '生成时间',
        ];
    }

    public function getToken()
    {

        return md5(substr(time(), 0, 3));
    }


    public function generateCode()
    {
        return base64_encode($this->token . $this->user_id);

    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->token = $this->getToken();
                $this->create_time = time();
            }
            return true;
        } else {
            return false;
        }
    }
}
