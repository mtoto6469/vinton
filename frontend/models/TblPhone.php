<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_phone".
 *
 * @property int $id
 * @property int $pishshomare
 * @property int $reng_az
 * @property int $reng_ta
 * @property string $ostan
 * @property string $shahr
 * @property string $name_markaz
 * @property string $vaziyat
 * @property string $vaziyat_forosh
 * @property string $sabtenam
 * @property string $enable
 * @property string $enableview
 */
class TblPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pishshomare', 'reng_az', 'reng_ta', 'ostan', 'shahr', 'name_markaz', 'vaziyat', 'vaziyat_forosh', 'sabtenam'], 'required'],
            [['pishshomare', 'reng_az', 'reng_ta',], 'integer'],
            [['vaziyat', 'vaziyat_forosh', 'enable', 'enableview','ostan', 'shahr', 'name_markaz'], 'string'],
            [['sabtenam'], 'string', 'max' => 500],
            [['pishshomare'], 'integer', 'min' => 3],
            [['ostan', 'shahr','name_markaz'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'pishshomare' => Yii::t('app', 'پیش شماره'),
            'reng_az' => Yii::t('app', 'رنج شماره از'),
            'reng_ta' => Yii::t('app', 'رنج شماره تا'),
            'ostan' => Yii::t('app', 'استان'),
            'shahr' => Yii::t('app', 'شهر'),
            'name_markaz' => Yii::t('app', 'مرکز مخابراتی'),
            'vaziyat' => Yii::t('app', 'وضعیت پوشش دهی'),
            'vaziyat_forosh' => Yii::t('app', 'وضعیت فروش'),
            'sabtenam' => Yii::t('app', 'نوع خدمات'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'حذف/نمایش'),
        ];
    }

    /**
     * @inheritdoc
     * @return TblPhoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblPhoneQuery(get_called_class());
    }
}
