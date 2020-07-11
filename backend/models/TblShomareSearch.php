<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblShomare;

/**
 * TblShomareSearch represents the model behind the search form of `backend\models\TblShomare`.
 */
class TblShomareSearch extends TblShomare
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'enable', 'enableview', 'price'], 'integer'],
            [['name_shomare', 'type_shomare', 'ostan', 'keshvar', ], 'safe'],
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
        $query = TblShomare::find()->where(['enableview'=>1]);

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
            'number' => $this->number,
            'enable' => $this->enable,
            'enableview' => $this->enableview,
        ]);

        $query->andFilterWhere(['like', 'name_shomare', $this->name_shomare])
            ->andFilterWhere(['like', 'type_shomare', $this->type_shomare])
            ->andFilterWhere(['like', 'ostan', $this->ostan])
            ->andFilterWhere(['like', 'keshvar', $this->keshvar])
            ->andFilterWhere(['like', 'price', $this->price]);

        return $dataProvider;
    }
}
