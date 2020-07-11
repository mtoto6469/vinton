<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "factor_ngn".
 *
 * @property int $id
 * @property int $id_user
 * @property string $type
 * @property string $eshterak
 * @property string $name
 * @property string $lastname
 * @property int $codemeli
 * @property string $shenasname
 * @property string $tarikh_tavalod
 * @property string $mahale_sodur
 * @property int $cellphone
 * @property int $cellphone2
 * @property int $phone
 * @property int $lng
 * @property int $lat
 * @property string $adress
 * @property int $code_posti
 * @property string $email
 * @property int $shomare_asiyatek
 * @property string $type_shomare_ngn
 * @property string $type_shomare_ngn2
 * @property string $shomare_darkhasti
 * @property string  $kodam_ip
 * @property int $nasb
 * @property string $type_vas
 * @property string $discription
 * @property string $dis
 * @property int $price
 * @property string $date
 * @property string $date_farsi
 * @property string $name_domain
 * @property string $be_shahr
 * @property int $telegram
 * @property string $ax_shenasaee
 * @property string $ax_emza
 * @property int $ersal_barge_telegram
 * @property int $ersal_mablaq_payam
 * @property int $tedad
 * @property int $niyazbasteinterneti
 * @property int $nasbdarmahal
 * @property string  $name_pedar
 * @property int $tedad_sip
 * @property int $tedad_soft
 * @property int $keshvari_ostani
 *

 */
class FactorNgn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factor_ngn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'type', 'eshterak', 'name', 'lastname', 'codemeli', 'shenasname', 'tarikh_tavalod', 'mahale_sodur', 'cellphone', 'lng', 'lat', 'adress', 'discription', 'date', 'date_farsi'], 'required'],
            [['id_user', 'codemeli', 'cellphone', 'cellphone2', 'phone', 'lng', 'lat', 'code_posti', 'shomare_asiyatek', 'telegram', 'ersal_barge_telegram', 'ersal_mablaq_payam','tedad','nasbdarmahal','niyazbasteinterneti','tedad_sip','tedad_soft','nasb', 'price','keshvari_ostani'], 'integer'],
            [['discription'], 'string'],
            [['date'], 'safe'],
            [['type', 'eshterak', 'name', 'lastname', 'shenasname', 'tarikh_tavalod', 'mahale_sodur', 'email', 'date_farsi', 'ax_shenasaee', 'ax_emza','name_domain','be_shahr','name_pedar', 'kodam_ip','type_shomare_ngn','type_shomare_ngn2','type_vas'], 'string', 'max' => 300],
            [['adress', 'shomare_darkhasti','dis'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'type' => Yii::t('app', 'Type'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'shenasname' => Yii::t('app', 'Shenasname'),
            'tarikh_tavalod' => Yii::t('app', 'Tarikh Tavalod'),
            'mahale_sodur' => Yii::t('app', 'Mahale Sodur'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'cellphone2' => Yii::t('app', 'Cellphone2'),
            'phone' => Yii::t('app', 'Phone'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'adress' => Yii::t('app', 'Adress'),
            'code_posti' => Yii::t('app', 'Code Posti'),
            'email' => Yii::t('app', 'Email'),
            'shomare_asiyatek' => Yii::t('app', 'Shomare Asiyatek'),
            'type_shomare_ngn' => Yii::t('app', 'type_shomare_ngn'),
            'type_shomare_ngn2' => Yii::t('app', 'type_shomare_ngn2'),
            'shomare_darkhasti' => Yii::t('app', 'Shomare Darkhasti'),
            'kodam_ip' => Yii::t('app',   'kodam_ip'),
            'nasb' => Yii::t('app', 'nasb'),
            'discription' => Yii::t('app', 'Discription'),
            'price' => Yii::t('app', 'Price'),
            'date' => Yii::t('app', 'Date'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'telegram' => Yii::t('app', 'Telegram'),
            'ax_shenasaee' => Yii::t('app', 'Ax Shenasaee'),
            'ax_emza' => Yii::t('app', 'Ax Emza'),
            'ersal_barge_telegram' => Yii::t('app', 'Ersal Barge Telegram'),
            'ersal_mablaq_payam' => Yii::t('app', 'Ersal Mablaq Payam'),
            'tedad' => Yii::t('app', 'tedad'),
            'dis' => Yii::t('app', 'dis'),
            'nasbdarmahal' => Yii::t('app', 'nasbdarmahal'),
            'niyazbasteinterneti' => Yii::t('app', 'niyazbasteinterneti'),
            'name_domain' => Yii::t('app', 'name_domain'),
            'be_shahr' => Yii::t('app', 'be_shahr'),
            'name_pedar' => Yii::t('app', 'name_pedar'),
            'tedad_sip' => Yii::t('app', 'tedad_sip'),
            'tedad_sowft' => Yii::t('app', 'tedad_soft'),
            'type_vas' => Yii::t('app', 'type_vas'),
            'keshvari_ostani' => Yii::t('app', 'keshvari_ostani'),
        ];
    }

    /**
     * @inheritdoc
     * @return FactorNgnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FactorNgnQuery(get_called_class());
    }
}
