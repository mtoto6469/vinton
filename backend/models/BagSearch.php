<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bag;

/**
 * BagSearch represents the model behind the search form of `backend\models\Bag`.
 */
class BagSearch extends Bag
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_profile', 'codemeli', 'shomareshenasname', 'cellphone', 'phone', 'lng', 'lat', 'codeposti', 'id_services', 'id_added'], 'integer'],
            [['sabtnam', 'shomaresabtnam', 'name', 'lastname', 'namepedar', 'tarikhtavalod', 'mahalesodur', 'name_malek', 'lastname_malek', 'codemeli_malek', 'adress', 'email', 'madrak_ax', 'discription', 'tarikh_kharid', 'vazeiyate_sabtnam'], 'safe'],
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
        $query = Bag::find();

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
            'id_profile' => $this->id_profile,
            'codemeli' => $this->codemeli,
            'shomareshenasname' => $this->shomareshenasname,
            'tarikhtavalod' => $this->tarikhtavalod,
            'cellphone' => $this->cellphone,
            'phone' => $this->phone,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'codeposti' => $this->codeposti,
            'id_services' => $this->id_services,
            'id_added' => $this->id_added,
            'tarikh_kharid' => $this->tarikh_kharid,
        ]);

        $query->andFilterWhere(['like', 'sabtnam', $this->sabtnam])
            ->andFilterWhere(['like', 'shomaresabtnam', $this->shomaresabtnam])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'namepedar', $this->namepedar])
            ->andFilterWhere(['like', 'mahalesodur', $this->mahalesodur])
            ->andFilterWhere(['like', 'name_malek', $this->name_malek])
            ->andFilterWhere(['like', 'lastname_malek', $this->lastname_malek])
            ->andFilterWhere(['like', 'codemeli_malek', $this->codemeli_malek])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'madrak_ax', $this->madrak_ax])
            ->andFilterWhere(['like', 'discription', $this->discription])
            ->andFilterWhere(['like', 'vazeiyate_sabtnam', $this->vazeiyate_sabtnam]);

        return $dataProvider;
    }
}
