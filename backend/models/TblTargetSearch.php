<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblTarget;

/**
 * TblTargetSearch represents the model behind the search form of `backend\models\TblTarget`.
 */
class TblTargetSearch extends TblTarget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'tagetforosh_mahane','targetforosh_ruzane','taeed','type_karshenas' ], 'integer'],
            [['datefa', 'date', 'sabtnam','ta_date','ta_date_farsi','eshterak','type_eshterak','name_markaz','ostan','shahr','name_mantaqe'], 'safe'],
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
        $query = TblTarget::find();

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
            'tagetforosh_mahane' => $this->tagetforosh_mahane,
            'targetforosh_ruzane' => $this->targetforosh_ruzane,
            'date' => $this->date,
            'ta_date' => $this->ta_date,
            'taeed' => $this->taeed,
            'type_karshenas' => $this->type_karshenas,

        ]);

        $query->andFilterWhere(['like', 'datefa', $this->datefa])
            ->andFilterWhere(['like', 'eshterak', $this->eshterak])
            ->andFilterWhere(['like', 'ta_date_farsi', $this->ta_date_farsi])
            ->andFilterWhere(['like', 'type_eshterak', $this->type_eshterak])
            ->andFilterWhere(['like', 'name_markaz', $this->name_markaz])
            ->andFilterWhere(['like', 'ostan', $this->ostan])
            ->andFilterWhere(['like', 'shahr', $this->shahr])
            ->andFilterWhere(['like', 'name_mantaqe', $this->name_mantaqe])
            ->andFilterWhere(['like', 'sabtnam', $this->sabtnam]);

        return $dataProvider;
    }
}
