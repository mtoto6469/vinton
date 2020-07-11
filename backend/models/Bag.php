<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bag".
 *
 * @property int $id
 * @property int $id_profile
 * @property string $sabtnam
 * @property string $shomaresabtnam
 * @property string $name
 * @property string $lastname
 * @property string $namepedar
 * @property int $codemeli
 * @property int $shomareshenasname
 * @property string $tarikhtavalod
 * @property string $mahalesodur
 * @property string $name_malek
 * @property string $lastname_malek
 * @property string $codemeli_malek
 * @property int $cellphone
 * @property int $phone
 * @property string $adress
 * @property int $lng
 * @property int $lat
 * @property int $codeposti
 * @property string $email
 * @property int $id_services
 * @property int $id_added
 * @property string $madrak_ax
 * @property string $discription
 * @property string $tarikh_kharid
 * @property string $vazeiyate_sabtnam
 */
class Bag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_profile', 'codemeli', 'shomareshenasname', 'cellphone', 'phone', 'lng', 'lat', 'codeposti', 'id_services', 'id_added'], 'integer'],
            [['sabtnam'], 'required'],
            [['tarikhtavalod', 'tarikh_kharid'], 'safe'],
            [['discription', 'vazeiyate_sabtnam'], 'string'],
            [['sabtnam', 'shomaresabtnam', 'name', 'lastname', 'namepedar', 'mahalesodur', 'name_malek', 'lastname_malek', 'codemeli_malek', 'email', 'madrak_ax'], 'string', 'max' => 400],
            [['adress'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_profile' => Yii::t('app', 'Id Profile'),
            'sabtnam' => Yii::t('app', 'Sabtnam'),
            'shomaresabtnam' => Yii::t('app', 'Shomaresabtnam'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'namepedar' => Yii::t('app', 'Namepedar'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'shomareshenasname' => Yii::t('app', 'Shomareshenasname'),
            'tarikhtavalod' => Yii::t('app', 'Tarikhtavalod'),
            'mahalesodur' => Yii::t('app', 'Mahalesodur'),
            'name_malek' => Yii::t('app', 'Name Malek'),
            'lastname_malek' => Yii::t('app', 'Lastname Malek'),
            'codemeli_malek' => Yii::t('app', 'Codemeli Malek'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'phone' => Yii::t('app', 'Phone'),
            'adress' => Yii::t('app', 'Adress'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'codeposti' => Yii::t('app', 'Codeposti'),
            'email' => Yii::t('app', 'Email'),
            'id_services' => Yii::t('app', 'Id Services'),
            'id_added' => Yii::t('app', 'Id Added'),
            'madrak_ax' => Yii::t('app', 'Madrak Ax'),
            'discription' => Yii::t('app', 'Discription'),
            'tarikh_kharid' => Yii::t('app', 'Tarikh Kharid'),
            'vazeiyate_sabtnam' => Yii::t('app', 'Vazeiyate Sabtnam'),
        ];
    }

    /**
     * @inheritdoc
     * @return BagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BagQuery(get_called_class());
    }
}
