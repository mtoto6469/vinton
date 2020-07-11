<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $semat
 * @property string $namepedar
 * @property int $codemeli
 * @property int $id_user
 * @property int $cellphone
 * @property int $phone
 * @property int $id_phone
 * @property int $id_mantaqe
 * @property int $enableview
 * @property int $hoquq
 *
 * @property string $saatkari_az
 * @property string $saatkari_ta
 * @property string $shahr
 * @property string $ostan
 * @property string $shomarepersenel
 * @property string $timeWork

 * @property string $nahveashnaee
 * @property string $ax_perseneli
 * @property string $ax_kartmeli
 * @property string $adress
 * @property string $tarikhsabt_karmand
 * @property string $tarikhsabt_karmand2
 */
class Profile extends \yii\db\ActiveRecord
{
    
    public $username;
    public $password;
    public $email;
    public $roles;

    public $dateStart;
    public $dateEnd;
    public $hurFrom;
    public $minFrom;
    public $hurTo;
    public $minTo;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['username', 'trim'],
            ['username', 'required', 'message' => 'نام کاربری نمی تواند خالی باشد.'],
//            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'نام کاربری تکراری می باشد.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'ایمیل نمی تواند خالی باشد.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'ایمیل وارد شده تکراری می باشد.'],

            ['password', 'required', 'message' => 'پسورد نمی تواند خالی باشد.'],
            ['password', 'string', 'min' => 6],

            [['roles','timeWork'],'string', 'max'=>255],
            
            [['name', 'lastname', 'semat', 'namepedar', 'codemeli', 'id_user', 'cellphone', 'phone', 'saatkari_az', 'saatkari_ta', 'shomarepersenel', 'tarikhsabt_karmand', 'tarikhsabt_karmand2','shahr','ostan'], 'required'],
            [['codemeli', 'id_user', 'cellphone', 'phone', 'id_phone','id_mantaqe','enableview','hoquq'], 'integer'],
            
            [[ 'tarikhsabt_karmand'], 'safe'],
            
            [['name', 'lastname', 'semat', 'namepedar', 'shomarepersenel', 'nahveashnaee', 'ax_perseneli', 'ax_kartmeli', 'tarikhsabt_karmand2','shahr','ostan','saatkari_az', 'saatkari_ta'], 'string', 'max' => 400],
            [['adress'], 'string', 'max' => 500],
            [['minTo'], 'number', 'max' => 60],
            [['hurTo'], 'integer', 'max' => 24],
            [['minFrom'], 'integer', 'max' => 60],
            [['hurFrom'], 'integer', 'max' => 24],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'name' => Yii::t('app', 'نام'),
            'lastname' => Yii::t('app', 'نام خانوادگی'),
            'semat' => Yii::t('app', 'سمت'),
            'namepedar' => Yii::t('app', 'نام پدر'),
            'codemeli' => Yii::t('app', 'کدملی'),
            'id_user' => Yii::t('app', 'شناسه کاربر'),
            'cellphone' => Yii::t('app', 'تلفن همراه'),
            'phone' => Yii::t('app', 'تلفن ثابت'),
            'id_phone' => Yii::t('app', 'مرکز فعالیت'),
            'id_mantaqe' => Yii::t('app', 'منظقه فعالیت'),
            'shahr' => Yii::t('app', 'شهر'),
            'ostan' => Yii::t('app', 'استان'),
            'enableview' => Yii::t('app', 'enableview'),
            'hoquq' => Yii::t('app', 'حقوق'),

            'saatkari_az' => Yii::t('app', 'ساعت کاری از'),
            'saatkari_ta' => Yii::t('app', 'ساعت کاری تا'),
            'shomarepersenel' => Yii::t('app', 'شماره پرسنلی'),
            'nahveashnaee' => Yii::t('app', 'نحوه آشنایی'),
            'ax_perseneli' => Yii::t('app', 'عکس پرسنلی'),
            'ax_kartmeli' => Yii::t('app', 'عکس کارت ملی'),
            'adress' => Yii::t('app', 'آدرس'),
            'tarikhsabt_karmand' => Yii::t('app', 'تاریخ ثبت کاربر'),
            'tarikhsabt_karmand2' => Yii::t('app', 'تاریخ ثبت کاربر'),
            'timeWork' => Yii::t('app', 'ساعت کاری'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
