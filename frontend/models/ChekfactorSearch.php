<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Chekfactor;

/**
 * ChekfactorSearch represents the model behind the search form of `frontend\models\Chekfactor`.
 */
class ChekfactorSearch extends Chekfactor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_factor', 'end_taeed', 'end_price', 'taliq'], 'integer'],
            [['vaziyat', 'dalil_ekhtelaf_qeymat'], 'safe'],
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
        $query = Chekfactor::find();

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
            'id_user' => $this->id_user,
            'id_factor' => $this->id_factor,
            'end_taeed' => $this->end_taeed,
            'end_price' => $this->end_price,
            'taliq' => $this->taliq,
        ]);

        $query->andFilterWhere(['like', 'vaziyat', $this->vaziyat])
            ->andFilterWhere(['like', 'dalil_ekhtelaf_qeymat', $this->dalil_ekhtelaf_qeymat]);

        return $dataProvider;
    }
}
