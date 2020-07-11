<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblAddedInformation;

/**
 * TblAddedInformationSearch represents the model behind the search form of `backend\models\TblAddedInformation`.
 */
class TblAddedInformationSearch extends TblAddedInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price','pursant'], 'integer'],
            [['name', 'service', 'sabtnam', 'enable', 'enableview'], 'safe'],
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
        $query = TblAddedInformation::find()->where(['enableview'=>1]);

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
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'sabtnam', $this->sabtnam])
            ->andFilterWhere(['like', 'pursant', $this->pursant])


            ->andFilterWhere(['like', 'enable', $this->enable])
            ->andFilterWhere(['like', 'enableview', $this->enableview]);

        return $dataProvider;
    }
}
