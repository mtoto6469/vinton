<?php
/**
 * Created by PhpStorm.
 * User: hadise
 * Date: 3/18/2018
 * Time: 1:20 AM
 */

namespace backend\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use Yii\web\UploadedFile;


class Upload extends ActiveRecord
{
    public $imageFile;
    public $imageFile2;


    public function rules()
    {
        return [
            
            [['imageFile','imageFile2'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

}