<?php

namespace app\user\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $mobile
 * @property string $password
 * @property string $hash
 * @property string $email
 * @property integer $last_login_time
 * @property string $status_is
 * @property integer $create_time
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_ACTIVE = 'Y';
    const STATUS_DISABLE = 'N';


    public $password_compare;

//    public $username;
//    public $email;
//    public $password;
//    public $password_compare;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_login_time', 'create_time'], 'integer'],
            [['status_is', 'password', 'nickname'], 'string'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => '用户名已存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'message' => '邮箱名已存在.'],

            [['password', 'password_compare'], 'string', 'min' => 8, 'max' => 20, 'message' => '{attribute}是8-20位数字或字母'],
            ['password_compare', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'],
            [['hash'], 'string', 'max' => 6],
            [['picture'], 'file', 'extensions' => 'gif, jpg,png,jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => '电子邮箱',
            'username' => '账号',
            'nickname' => '昵称',
            'mobile' => '手机号',
            'password' => '密码',
            'hash' => 'Hash',
            'last_login_time' => '最后登录时间',
            'status_is' => '用户状态',
            'create_time' => '录入时间',
            'rememberMe' => '记住我',
            'picture' => '头像',
        ];
    }

    /**
     * 检测用户密码
     *
     * @return boolean
     */
    public function validatePassword($password)
    {
        return $this->hashPassword($password, $this->hash) === $this->password;
    }

    /**
     * 密码进行加密
     * @return string password
     */
    public function hashPassword($password)
    {
        //$salt = substr(uniqid(rand()), -6);
        return md5(md5($password) . $this->hash);
    }


    public static function findByMobile($mobile)
    {
        return static::findOne(['mobile' => $mobile, 'status_is' => self::STATUS_ACTIVE]);
    }


    public static function findByEmailOrUsername($u)
    {
        return static::find()->where(['status_is' => self::STATUS_ACTIVE])->orWhere(['email' => $u, 'username' => $u])->one();
    }


    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id' => $id, 'status_is' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw  new NotSupportedException("findIdentityByAccessToken is not implented.");
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->getPrimaryKey();
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /*
     * 三种尺寸
     * 64 90 240
     */
    public function getPicture($size=240)
    {
        return Url::to(["/avatar/{$this->username}/{$size}.png"]);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $hash = substr(uniqid(rand()), -6);
                $this->hash = $hash;
                $this->create_time = time();
                $this->password = $this->hashPassword($this->password);
            }
            return true;
        } else {
            return false;
        }
    }

}
