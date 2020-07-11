<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblPresence;

/**
 * TblPresenceSearch represents the model behind the search form about `backend\models\TblPresence`.
 */
class TblPresenceSearch extends TblPresence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'login', 'logout', 'enabel', 'enabel_view'], 'integer'],
            [['date', 'dateIr', 'time', 'dateEdit', 'sh1', 'sh2', 'sh3', 'sh4'], 'safe'],
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
        $query = TblPresence::find();

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
            'date' => $this->date,
            'time' => $this->time,
            'login' => $this->login,
            'logout' => $this->logout,
            'dateEdit' => $this->dateEdit,
            'enabel' => $this->enabel,
            'enabel_view' => $this->enabel_view,
        ]);

        $query->andFilterWhere(['like', 'dateIr', $this->dateIr])
            ->andFilterWhere(['like', 'sh1', $this->sh1])
            ->andFilterWhere(['like', 'sh2', $this->sh2])
            ->andFilterWhere(['like', 'sh3', $this->sh3])
            ->andFilterWhere(['like', 'sh4', $this->sh4]);

        return $dataProvider;
    }
}
