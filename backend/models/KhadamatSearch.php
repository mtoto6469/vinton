<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Khadamat;

/**
 * KhadamatSearch represents the model behind the search form of `backend\models\Khadamat`.
 */
class KhadamatSearch extends Khadamat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'enable', 'enableview', 'price','pursant'], 'integer'],
            [['type_bastar', 'time', 'mizan_darkhasti', 'sabtnam'], 'safe'],
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
        $query = Khadamat::find()->where(['enableview'=>1]);

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

        $query->andFilterWhere(['like', 'type_bastar', $this->type_bastar])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'mizan_darkhasti', $this->mizan_darkhasti])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'sabtnam', $this->sabtnam]);

        return $dataProvider;
    }
}
