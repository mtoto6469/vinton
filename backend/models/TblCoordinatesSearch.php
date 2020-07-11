<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblCoordinates;

/**
 * TblCoordinatesSearch represents the model behind the search form about `backend\models\TblCoordinates`.
 */
class TblCoordinatesSearch extends TblCoordinates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_range', 'enabel', 'enabel_view'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['sh1', 'sh2'], 'safe'],
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
        $query = TblCoordinates::find()->where(['enabel_view'=>1]);

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
            'id_range' => $this->id_range,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
        ]);

        $query->andFilterWhere(['like', 'sh1', $this->sh1])
            ->andFilterWhere(['like', 'sh2', $this->sh2]);

        return $dataProvider;
    }
}
