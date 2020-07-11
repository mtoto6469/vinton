<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "host".
 *
 * @property int $id
 * @property string $name
 * @property string $faza
 * @property string $time
 * @property string $terafik
 * @property string $systemamel
 * @property string $controll_panel
 * @property string $pahnayeband
 * @property string $price
 * @property string $discription
 * @property int $pursant
 * @property int $enable
 * @property int $enableview
 */
class Host extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'host';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'faza', 'time', 'terafik', 'systemamel', 'controll_panel', 'pahnayeband'], 'required'],
            [['enable', 'enableview','pursant'], 'integer'],
            [['name', 'faza', 'time', 'terafik', 'systemamel', 'controll_panel', 'pahnayeband', 'price'], 'string', 'max' => 300],
            [['discription'], 'string', 'max' => 500],
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
            'faza' => Yii::t('app', 'فضا'),
            'time' => Yii::t('app', 'مدت'),
            'terafik' => Yii::t('app', 'ترافیک'),
            'systemamel' => Yii::t('app', 'سیستم عامل'),
            'controll_panel' => Yii::t('app', 'کنترل پنل'),
            'pahnayeband' => Yii::t('app', 'پهنای باند'),
            'price' => Yii::t('app', 'قیمت'),
            'discription' => Yii::t('app', 'توضیحات'),
            'pursant' => Yii::t('app', 'پورسانت'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'Enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return HostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HostQuery(get_called_class());
    }
}
