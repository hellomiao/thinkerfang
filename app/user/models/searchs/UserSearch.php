<?php

namespace app\user\models\searchs;

use app\user\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class UserSearch extends User
{


    public function rules()
    {
        return [
            [['mobile'], 'safe'],  //这里nickname一定要写，根据你自己的命名去写，不写的话搜索框出不来
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'mobile', $this->mobile]);





        return $dataProvider;
    }
}
?>