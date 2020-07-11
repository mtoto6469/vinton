<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Adsl;

/**
 * AdslSearch represents the model behind the search form of `frontend\models\Adsl`.
 */
class AdslSearch extends Adsl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'vazeyat_sabt', 'codemeli', 'shenasname', 'codemeli_malek', 'cellphone', 'cellphone2', 'telegram', 'phone', 'codeposti', 'ersal_barge_telegram', 'ersal_mablaq_payamak', 'id_services', 'price','id_tblphone','id_tblservice1'], 'integer'],
            [['eshterak', 'name', 'lastname', 'tarikh_tavalod', 'mahale_sodur', 'name_malek', 'lastname_malek', 'adress', 'email', 'ax_shenasaee', 'ax_emza', 'discription','name_pedar', 'id_added'], 'safe'],
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
        $query = Adsl::find();

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
            'vazeyat_sabt' => $this->vazeyat_sabt,
            'codemeli' => $this->codemeli,
            'shenasname' => $this->shenasname,
            'codemeli_malek' => $this->codemeli_malek,
            'cellphone' => $this->cellphone,
            'cellphone2' => $this->cellphone2,
            'telegram' => $this->telegram,
            'phone' => $this->phone,
            'codeposti' => $this->codeposti,
            'ersal_barge_telegram' => $this->ersal_barge_telegram,
            'ersal_mablaq_payamak' => $this->ersal_mablaq_payamak,
            'id_services' => $this->id_services,
            'id_added' => $this->id_added,
        ]);

        $query->andFilterWhere(['like', 'eshterak', $this->eshterak])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'tarikh_tavalod', $this->tarikh_tavalod])
            ->andFilterWhere(['like', 'mahale_sodur', $this->mahale_sodur])
            ->andFilterWhere(['like', 'name_malek', $this->name_malek])
            ->andFilterWhere(['like', 'lastname_malek', $this->lastname_malek])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'ax_shenasaee', $this->ax_shenasaee])
            ->andFilterWhere(['like', 'ax_emza', $this->ax_emza])
            ->andFilterWhere(['like', 'ax_emza', $this->name_pedar])
            ->andFilterWhere(['like', 'id_tblservice1', $this->id_tblservice1])
            ->andFilterWhere(['like', 'id_tblphone', $this->id_tblphone])
            ->andFilterWhere(['like', 'discription', $this->discription]);

        return $dataProvider;
    }
}
