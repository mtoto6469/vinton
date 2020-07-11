<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Hozefaaliyat]].
 *
 * @see Hozefaaliyat
 */
class HozeFaaliyatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Hozefaaliyat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Hozefaaliyat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
