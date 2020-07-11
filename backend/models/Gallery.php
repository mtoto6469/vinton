<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use Yii\web\UploadedFile;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $img
 * @property string $alert
 * @property string $pasvand
 * @property string $enable
 * @property string $enableview
 */
class Gallery extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['pasvand','img', 'alert'], 'required'],
            [['pasvand','enableview',  'enable'], 'string'],
            [['img', 'alert'], 'string', 'max' => 300],
           
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'img' => Yii::t('app', 'آپلود عکس'),
            'alert' => Yii::t('app', 'نوشته عکس'),
            'pasvand' => Yii::t('app', 'پسوند'),
            'enable' => Yii::t('app', 'قابل نمایش'),
            'enableview' => Yii::t('app', 'enableview'),
        ];
    }

    /**
     * @inheritdoc
     * @return GalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GalleryQuery(get_called_class());
    }
}
