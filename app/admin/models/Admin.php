<?php

namespace app\admin\models;

use app\project\models\Project;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $realname
 * @property string $email
 * @property string $qq
 * @property string $mobile
 * @property string $last_login_ip
 * @property integer $last_login_time
 * @property string $hash
 * @property string $status_is
 * @property string $is_del
 * @property integer $group_id
 * @property integer $create_time
 */
class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $rememberMe;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    const STATUS_ACTIVE = 'Y';
    const STATUS_DISABLE = 'N';

    public function scenarios()
    {
        parent::scenarios();

        return [
            'create' => ['username', 'password', 'realname', 'mobile', 'email',
                'hash', 'qq', 'last_login_ip', 'last_login_time', 'create_time', 'group_id', 'status_is'],
            'update' => ['username', 'realname', 'mobile', 'group_id',
                'hash', 'qq', 'last_login_ip', 'last_login_time', 'create_time', 'status_is', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => ['create']],
            [['group_id'], 'required'],
            [['last_login_time', 'create_time', 'is_del'], 'integer'],
            [['status_is'], 'string'],
            [['username'], 'unique'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'min' => 6, 'max' => 32],
            [['realname', 'email'], 'string', 'max' => 100],
            [['qq', 'last_login_ip'], 'string', 'max' => 15],
            [['mobile'], 'string', 'max' => 20],
            [['hash'], 'string', 'max' => 6]
        ];
    }

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


    public static function getStatus()
    {
        return [
            '' => '全部',
            self::STATUS_ACTIVE => '正常',
            self::STATUS_DISABLE => '禁止',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户',
            'password' => '密码',
            'realname' => '真实姓名',
            'email' => '邮箱',
            'qq' => 'QQ',
            'mobile' => '电话',
            'last_login_ip' => '最后登录ip',
            'last_login_time' => '最后登录时间',
            'hash' => 'Hash',
            'status_is' => '用户状态',
            'group_id' => '用户组',
            'create_time' => '录入时间',
            'rememberMe' => '记住我'
        ];
    }

    public function getGroup()
    {
        return $this->hasOne(AdminGroup::className(), ['id' => 'group_id']);
    }

    public function getGroupName()
    {
        $list = AdminGroup::findAll(['id' => explode(',', $this->group_id)]);
        $name = '';
        foreach ($list as $key => $val) {
            $name .= $val['group_name'] . ',';
        }
        $name = substr($name, 0, -1);
        return $name;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status_is' => self::STATUS_ACTIVE]);
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


    public static function getListByGroupId($id = [])
    {

        $query = self::find();
        if (!empty($id)) {
            foreach ($id as $v) {
                $query->orWhere("FIND_IN_SET('{$v}',group_id)");
            }

        }
        $list = $query->all();
        $data = [];
        foreach ($list as $key => $val) {
            $data[$val->id] = $val->realname . "($val->username)";
        }
        return $data;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($insert) {
                $hash = substr(uniqid(rand()), -6);
                $this->hash = $hash;
                $this->create_time = time();
                $this->password = $this->hashPassword($this->password);
                $this->group_id = implode(',', $this->group_id);
            }


            return true;
        } else {
            return false;
        }
    }



}
