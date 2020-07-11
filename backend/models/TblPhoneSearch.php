<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPhone;

/**
 * TblPhoneSearch represents the model behind the search form of `backend\models\TblPhone`.
 */
class TblPhoneSearch extends TblPhone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pishshomare', 'reng_az', 'reng_ta', ], 'integer'],
            [['vaziyat', 'vaziyat_forosh', 'sabtenam', 'enable', 'enableview','ostan', 'shahr', 'name_markaz'], 'safe'],
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
        $query =TblPhone::find()->where(['enableview'=>'1']);

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
            'pishshomare' => $this->pishshomare,
            'reng_az' => $this->reng_az,
            'reng_ta' => $this->reng_ta,
            'ostan' => $this->ostan,
            'shahr' => $this->shahr,
            'name_markaz' => $this->name_markaz,
        ]);

        $query->andFilterWhere(['like', 'vaziyat', $this->vaziyat])
            ->andFilterWhere(['like', 'vaziyat_forosh', $this->vaziyat_forosh])
            ->andFilterWhere(['like', 'sabtenam', $this->sabtenam])
            ->andFilterWhere(['like', 'enable', $this->enable])
            ->andFilterWhere(['like', 'enableview', $this->enableview]);

        return $dataProvider;
    }
}
