<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FactorNgn;

/**
 * FactorNgnSearch represents the model behind the search form of `frontend\models\FactorNgn`.
 */
class FactorNgnSearch extends FactorNgn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'codemeli', 'cellphone', 'cellphone2', 'phone', 'lng', 'lat', 'code_posti', 'shomare_asiyatek', 'telegram', 'ersal_barge_telegram', 'ersal_mablaq_payam','tedad_sip','tedad_soft','nasb', 'price','keshvari_ostani'], 'integer'],
            [['type', 'eshterak', 'name', 'lastname', 'shenasname', 'tarikh_tavalod', 'mahale_sodur', 'adress', 'email', 'shomare_darkhasti', 'discription', 'date', 'date_farsi', 'ax_shenasaee', 'ax_emza','tedad','name_pedare','tedad_sip','tedad_sowft',  'kodam_ip','type_shomare_ngn','type_shomare_ngn2','type_vas'], 'safe'],
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
        $query = FactorNgn::find();

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
            'codemeli' => $this->codemeli,
            'cellphone' => $this->cellphone,
            'cellphone2' => $this->cellphone2,
            'phone' => $this->phone,
            'lng' => $this->lng,
            'lat' => $this->lat,
            'code_posti' => $this->code_posti,
            'shomare_asiyatek' => $this->shomare_asiyatek,
            'type_shomare_ngn' => $this->type_shomare_ngn,
            'type_shomare_ngn2' => $this->type_shomare_ngn2,
            'kodam_ip' => $this-> kodam_ip,
            'nasb' => $this->nasb,
            'date' => $this->date,
            'telegram' => $this->telegram,
            'ersal_barge_telegram' => $this->ersal_barge_telegram,
            'ersal_mablaq_payam' => $this->ersal_mablaq_payam,
            'keshvari_ostani' => $this->keshvari_ostani,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'eshterak', $this->eshterak])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'shenasname', $this->shenasname])
            ->andFilterWhere(['like', 'tarikh_tavalod', $this->tarikh_tavalod])
            ->andFilterWhere(['like', 'mahale_sodur', $this->mahale_sodur])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'shomare_darkhasti', $this->shomare_darkhasti])
            ->andFilterWhere(['like', 'discription', $this->discription])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'date_farsi', $this->date_farsi])
            ->andFilterWhere(['like', 'ax_shenasaee', $this->ax_shenasaee])
            ->andFilterWhere(['like', 'tedad', $this->tedad])
            ->andFilterWhere(['like', 'dis', $this->dis])
            ->andFilterWhere(['like', 'name_pedare', $this->name_pedar])
            ->andFilterWhere(['like', 'tedad_sip', $this->tedad_sip])
            ->andFilterWhere(['like', 'tedad_sowft', $this->tedad_soft])
            ->andFilterWhere(['like', 'niyazbasteinterneti', $this->niyazbasteinterneti])
            ->andFilterWhere(['like', 'nasbdarmahal', $this->nasbdarmahal])
            ->andFilterWhere(['like', 'name_domain', $this->name_domain])
            ->andFilterWhere(['like', 'be_shahr', $this->be_shahr])
            ->andFilterWhere(['like', 'type_vas', $this->type_vas])
            ->andFilterWhere(['like', 'ax_emza', $this->ax_emza]);

        return $dataProvider;
    }
}
