<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "idc".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_khadamat
 * @property string $eshterak
 * @property string $name
 * @property string $lastname
 * @property string $namepedar
 * @property string $codemeli
 * @property string $shomareshenasname
 * @property string $tarikh_tavalod
 * @property string $cellphone
 * @property string $cellphone2
 * @property int $lng
 * @property int $lat
 * @property string $adress
 * @property string $codeposti
 * @property string $email
 * @property string $name_sherkat
 * @property string $shenase_meli
 * @property string $sabt_sherkat
 * @property string $nemune_mohr
 * @property string $madarek_hoviyati
 * @property int $price
 * @property string $date
 * @property string $date_farsi
 * @property string $type
 * @property int $telegram
 * @property int $ersal_barge_telegram
 * @property int $ersal_payamak
 * @property int $ersal_email
 * @property string $datasanter
 * @property string $phone
 * @property string $name_domain
 * @property int $id_domain
 * @property int $id_host
 * @property string $mahale_sodur
 * @property int $host_darid
 * @property int $domain_darid
 * @property string $type_domain
 * @property string $code_enteqal_domain
 * @property string $dns
 * @property string $dns2
 * @property string $modate_domain
 */
class Idc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'idc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'eshterak', 'name', 'lastname', 'namepedar', 'codemeli', 'shomareshenasname', 'tarikh_tavalod', 'cellphone', 'lng', 'lat', 'adress', 'name_sherkat', 'shenase_meli', 'date', 'date_farsi', 'type'], 'required'],
            [['id_user', 'id_khadamat', 'codemeli', 'shomareshenasname', 'cellphone', 'cellphone2', 'lng', 'lat', 'codeposti', 'sabt_sherkat', 'telegram', 'ersal_barge_telegram', 'ersal_payamak', 'ersal_email', 'phone', 'id_domain', 'id_host', 'host_darid', 'domain_darid','price'], 'integer'],
            [['date'], 'safe'],
            [['eshterak', 'name', 'lastname', 'namepedar', 'tarikh_tavalod', 'email', 'name_sherkat', 'shenase_meli', 'nemune_mohr', 'date_farsi', 'type', 'datasanter', 'name_domain', 'mahale_sodur', 'type_domain', 'code_enteqal_domain', 'modate_domain'], 'string', 'max' => 300],
            [['adress', 'madarek_hoviyati'], 'string', 'max' => 500],
            [['dns', 'dns2'], 'string', 'max' => 600],
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
            'id_khadamat' => Yii::t('app', 'Id Khadamat'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'namepedar' => Yii::t('app', 'Namepedar'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'shomareshenasname' => Yii::t('app', 'Shomareshenasname'),
            'tarikh_tavalod' => Yii::t('app', 'Tarikh Tavalod'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'cellphone2' => Yii::t('app', 'Cellphone2'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'adress' => Yii::t('app', 'Adress'),
            'codeposti' => Yii::t('app', 'Codeposti'),
            'email' => Yii::t('app', 'Email'),
            'name_sherkat' => Yii::t('app', 'Name Sherkat'),
            'shenase_meli' => Yii::t('app', 'Shenase Meli'),
            'sabt_sherkat' => Yii::t('app', 'Sabt Sherkat'),
            'nemune_mohr' => Yii::t('app', 'Nemune Mohr'),
            'madarek_hoviyati' => Yii::t('app', 'Madarek Hoviyati'),
            'price' => Yii::t('app', 'Price'),
            'date' => Yii::t('app', 'Date'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'type' => Yii::t('app', 'Type'),
            'telegram' => Yii::t('app', 'Telegram'),
            'ersal_barge_telegram' => Yii::t('app', 'Ersal Barge Telegram'),
            'ersal_payamak' => Yii::t('app', 'Ersal Payamak'),
            'ersal_email' => Yii::t('app', 'Ersal Email'),
            'datasanter' => Yii::t('app', 'Datasanter'),
            'phone' => Yii::t('app', 'Phone'),
            'name_domain' => Yii::t('app', 'Name Domain'),
            'id_domain' => Yii::t('app', 'Id Domain'),
            'id_host' => Yii::t('app', 'Id Host'),
            'mahale_sodur' => Yii::t('app', 'Mahale Sodur'),
            'host_darid' => Yii::t('app', 'Host Darid'),
            'domain_darid' => Yii::t('app', 'Domain Darid'),
            'type_domain' => Yii::t('app', 'Type Domain'),
            'code_enteqal_domain' => Yii::t('app', 'Code Enteqal Domain'),
            'dns' => Yii::t('app', 'Dns'),
            'dns2' => Yii::t('app', 'Dns2'),
            'modate_domain' => Yii::t('app', 'Modate Domain'),
        ];
    }

    /**
     * @inheritdoc
     * @return IdcQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IdcQuery(get_called_class());
    }
}
