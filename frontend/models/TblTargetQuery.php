<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tbltarget]].
 *
 * @see Tbltarget
 */
class TblTargetQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tbltarget[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tbltarget|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
