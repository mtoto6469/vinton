<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sabtnam".
 *
 * @property int $id
 * @property string $name
 * @property int $ranzh
 * @property int $porsant

 */
class Sabtnam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sabtnam';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','ranzh', 'porsant'], 'required'],
            [['ranzh', 'porsant'], 'integer'],
            [['name'], 'string', 'max' => 300],
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
            'ranzh' => Yii::t('app', 'رانژ'),
            'porsant' => Yii::t('app', 'پورسانت'),
        
        ];
    }

    /**
     * @inheritdoc
     * @return SabtnamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SabtnamQuery(get_called_class());
    }
}
