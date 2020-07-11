<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblServices1;

/**
 * TblServices1Search represents the model behind the search form of `backend\models\TblServices1`.
 */
class TblServices1Search extends TblServices1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'enable', 'enableview', 'price','pursant'], 'integer'],
            [['name', 'speed', 'hajm', 'time', 'sabtnam','type'], 'safe'],
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
        $query = TblServices1::find()->where(['enableview'=>1]);

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
            'pursant' => $this->pursant,
            'enable' => $this->enable,
            'enableview' => $this->enableview,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'speed', $this->speed])
            ->andFilterWhere(['like', 'hajm', $this->hajm])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'sabtnam', $this->sabtnam])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
