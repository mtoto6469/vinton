<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_semat".
 *
 * @property int $id
 * @property string $semat
 */
class TblSemat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_semat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semat'], 'required'],
            [['semat'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'semat' => Yii::t('app', 'سمت کارمندان'),
        ];
    }

    /**
     * @inheritdoc
     * @return TQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TQuery(get_called_class());
    }
}
