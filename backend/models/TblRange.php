<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_range".
 *
 * @property integer $id
 * @property string $name
 * @property integer $enabel
 * @property integer $enabel_view
 */
class TblRange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_range';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['enabel', 'enabel_view'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'name' => 'نام',
            'enabel' => 'قابل نمایش',
            'enabel_view' => 'Enabel View',
        ];
    }

    /**
     * @inheritdoc
     * @return TblRangeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblRangeQuery(get_called_class());
    }
}
