<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "adsl".
 *
 * @property int $id
 * @property int $id_user
 * @property string $eshterak
 * @property string $type
 * @property int $vazeyat_sabt
 * @property string $name
 * @property string $lastname
 * @property int $codemeli
 * @property int $shenasname
 * @property string $tarikh_tavalod
 * @property string $mahale_sodur
 * @property string $name_malek
 * @property string $lastname_malek
 * @property int $codemeli_malek
 * @property int $cellphone
 * @property int $cellphone2
 * @property int $telegram
 * @property int $phone
 * @property string $adress
 * @property int $codeposti
 * @property string $email
 * @property string $ax_shenasaee
 * @property string $name_pedar
 * @property string $ax_emza
 * @property string $discription
 * @property int $ersal_barge_telegram
 * @property int $ersal_mablaq_payamak
 * @property int $price
 * @property int $lng
 * @property int $lat
 * @property int $id_tblphone
 * @property int $id_tblservice1
 * @property int $id_services
 * @property string $id_added
 * @property string $date_farsi
 * @property string $date
 */
class Adsl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adsl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'eshterak', 'name', 'lastname', 'cellphone','type','date_farsi','date'], 'required'],
            [['id_user', 'vazeyat_sabt', 'codemeli', 'shenasname', 'codemeli_malek', 'cellphone', 'cellphone2', 'telegram', 'phone', 'codeposti', 'ersal_barge_telegram', 'ersal_mablaq_payamak', 'id_services','lng','lat','price','id_tblservice1','id_tblphone'], 'integer'],
            [['eshterak', 'name', 'lastname', 'tarikh_tavalod', 'mahale_sodur', 'name_malek', 'lastname_malek', 'email', 'ax_shenasaee', 'ax_emza','type','date_farsi','name_pedar','id_added'], 'string', 'max' => 300],
            [['adress', 'discription'], 'string', 'max' => 500],
            [['date'],'safe']
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
            'type' => Yii::t('app', 'type'),
            'price' => Yii::t('app', 'price'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'vazeyat_sabt' => Yii::t('app', 'Vazeyat Sabt'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'shenasname' => Yii::t('app', 'Shenasname'),
            'tarikh_tavalod' => Yii::t('app', 'Tarikh Tavalod'),
            'mahale_sodur' => Yii::t('app', 'Mahale Sodur'),
            'name_malek' => Yii::t('app', 'Name Malek'),
            'lastname_malek' => Yii::t('app', 'Lastname Malek'),
            'codemeli_malek' => Yii::t('app', 'Codemeli Malek'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'cellphone2' => Yii::t('app', 'Cellphone2'),
            'telegram' => Yii::t('app', 'Telegram'),
            'phone' => Yii::t('app', 'Phone'),
            'adress' => Yii::t('app', 'Adress'),
            'codeposti' => Yii::t('app', 'Codeposti'),
            'email' => Yii::t('app', 'Email'),
            'ax_shenasaee' => Yii::t('app', 'Ax Shenasaee'),
            'ax_emza' => Yii::t('app', 'Ax Emza'),
            'discription' => Yii::t('app', 'Discription'),
            'ersal_barge_telegram' => Yii::t('app', 'Ersal Barge Telegram'),
            'ersal_mablaq_payamak' => Yii::t('app', 'Ersal Mablaq Payamak'),
            'id_services' => Yii::t('app', 'Id Services'),
            'id_added' => Yii::t('app', 'id Added'),
            'date' => Yii::t('app', 'date'),
            'date_farsi' => Yii::t('app', 'date_farsi'),
            'lng' => Yii::t('app', 'lng'),
            'lat' => Yii::t('app', 'lat'),
            'name_pedar' => Yii::t('app', 'name_pedar'),
            'id_tblservice1' => Yii::t('app', 'id_tblservice1'),
            'id_tblphone' => Yii::t('app', 'id_tblphone'),
        ];
    }

    /**
     * @inheritdoc
     * @return AdslQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdslQuery(get_called_class());
    }
}
