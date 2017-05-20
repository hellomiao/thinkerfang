<?php

namespace app\admin\models;

use Yii;

/**
 * This is the model class for table "{{%admin_groupacl}}".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $acl_ids
 */
class AdminGroupAcl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_groupacl}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['acl_ids'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'acl_ids' => 'Acl Ids',
        ];
    }



    //给jstree提供用户组权限json数据
    public function getJsonData($group_id)
    {
        $acl  = new AdminAcl();
        $data = array();
        $list = $acl->find()->orderBy("`order_num` ASC")->asArray()->all();
        foreach ($list as $k => $v)
        {

            if ($v['parent_id'] == 0)
            {
                $data[$k]['id']     = $v['id'];
                $data[$k]['parent'] = '#';
                $data[$k]['text']   = $v['name'];
                $data[$k]['state']  = array('opened' => true);
            }
            else
            {
                $data[$k]['id']     = $v['id'];
                $data[$k]['parent'] = $v['parent_id'];
                $data[$k]['text']   = $v['name'];
                $data[$k]['state']  = array('opened' => true);
            }
            $isExists = $this->find()->where('group_id=:gid AND FIND_IN_SET(:id,acl_ids)', array('gid'=>$group_id,'id' => $v['id']))->exists();
            if ($isExists)
            {
                $data[$k]['state'] = array('opened' => true, 'selected' => true);
            }
        }

        return json_encode($data);
    }
}
