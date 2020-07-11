<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Idc;

/**
 * IdcSearch represents the model behind the search form of `frontend\models\Idc`.
 */
class IdcSearch extends Idc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_khadamat', 'codemeli', 'shomareshenasname', 'cellphone', 'cellphone2', 'lng', 'lat', 'codeposti', 'sabt_sherkat', 'type', 'telegram', 'ersal_barge_telegram', 'ersal_payamak', 'ersal_email','phone','host_darid','host_darid'], 'integer'],
            [['eshterak', 'name', 'lastname', 'namepedar', 'tarikh_tavalod', 'adress', 'email', 'name_sherkat', 'shenase_meli', 'nemune_mohr', 'madarek_hoviyati', 'price', 'date', 'date_farsi', 'datasanter','mahale_sodur'], 'safe'],
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
        $query = Idc::find();

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
            'id_khadamat' => $this->id_khadamat,
            'codemeli' => $this->codemeli,
            'shomareshenasname' => $this->shomareshenasname,
            'cellphone' => $this->cellphone,
            'cellphone2' => $this->cellphone2,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'codeposti' => $this->codeposti,
            'sabt_sherkat' => $this->sabt_sherkat,
            'date' => $this->date,
            'type' => $this->type,
            'telegram' => $this->telegram,
            'ersal_barge_telegram' => $this->ersal_barge_telegram,
            'ersal_payamak' => $this->ersal_payamak,
            'ersal_email' => $this->ersal_email,
        ]);

        $query->andFilterWhere(['like', 'eshterak', $this->eshterak])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'namepedar', $this->namepedar])
            ->andFilterWhere(['like', 'tarikh_tavalod', $this->tarikh_tavalod])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name_sherkat', $this->name_sherkat])
            ->andFilterWhere(['like', 'shenase_meli', $this->shenase_meli])
            ->andFilterWhere(['like', 'nemune_mohr', $this->nemune_mohr])
            ->andFilterWhere(['like', 'madarek_hoviyati', $this->madarek_hoviyati])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'date_farsi', $this->date_farsi])
            ->andFilterWhere(['like', 'id_domain', $this->id_domain])
            ->andFilterWhere(['like', 'name_domain', $this->name_domain])
            ->andFilterWhere(['like', 'id_host', $this->id_host])
            ->andFilterWhere(['like', 'mahale_sodur', $this->mahale_sodur])
            ->andFilterWhere(['like', 'datasanter', $this->datasanter]);

        return $dataProvider;
    }
}
