<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `frontend\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'codemeli', 'id_user', 'cellphone', 'phone', 'id_phone','hoquq'], 'integer'],
            [['name', 'lastname', 'semat', 'namepedar', 'lng', 'lat', 'saatkari_az','timeWork', 'saatkari_ta', 'shomarepersenel', 'eshterak', 'nahveashnaee', 'ax_perseneli', 'ax_kartmeli', 'adress', 'tarikhsabt_karmand', 'tarikhsabt_karmand2'], 'safe'],
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
        $query = Profile::find();

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
            'codemeli' => $this->codemeli,
            'id_user' => $this->id_user,
            'cellphone' => $this->cellphone,
            'phone' => $this->phone,
            'id_phone' => $this->id_phone,
            'saatkari_az' => $this->saatkari_az,
            'saatkari_ta' => $this->saatkari_ta,
            'tarikhsabt_karmand' => $this->tarikhsabt_karmand,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'semat', $this->semat])
            ->andFilterWhere(['like', 'namepedar', $this->namepedar])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'shomarepersenel', $this->shomarepersenel])
            ->andFilterWhere(['like', 'eshterak', $this->eshterak])
            ->andFilterWhere(['like', 'nahveashnaee', $this->nahveashnaee])
            ->andFilterWhere(['like', 'ax_perseneli', $this->ax_perseneli])
            ->andFilterWhere(['like', 'ax_kartmeli', $this->ax_kartmeli])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'hoquq', $this->hoquq])
            ->andFilterWhere(['like', 'timeWork', $this->timeWork])
            ->andFilterWhere(['like', 'tarikhsabt_karmand2', $this->tarikhsabt_karmand2]);

        return $dataProvider;
    }
}
