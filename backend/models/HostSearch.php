<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Host;

/**
 * HostSearch represents the model behind the search form of `backend\models\Host`.
 */
class HostSearch extends Host
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'enable', 'enableview','pursant'], 'integer'],
            [['name', 'faza', 'time', 'terafik', 'systemamel', 'controll_panel', 'pahnayeband', 'price', 'discription'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Host::find()->where(['enableview'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'enable' => $this->enable,
            'pursant' => $this->pursant,
            'enableview' => $this->enableview,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'faza', $this->faza])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'terafik', $this->terafik])
            ->andFilterWhere(['like', 'systemamel', $this->systemamel])
            ->andFilterWhere(['like', 'controll_panel', $this->controll_panel])
            ->andFilterWhere(['like', 'pahnayeband', $this->pahnayeband])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'discription', $this->discription]);

        return $dataProvider;
    }
}
